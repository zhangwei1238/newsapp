<?php 
namespace app\api\controller;
use think\Controller;
use app\common\lib\exception\ApiException;
use app\common\lib\IAuth;
use app\common\lib\Aes;
use app\common\lib\Time;
use think\Cache;
/**
* API模块 公用控制器
*/
class Common extends Controller
{
	// headers头信息
	public $headers='';
	/**
	 * 初始化方法
	 */
	public function _initialize(){
		$this->checkRequestAuth();
		//$this->test();
	}	

	/**
	 * 检查每次app请求的数据是否合法
	 */
	public function checkRequestAuth(){
		// 首先获取headers
		$headers = request()->header();
		// sign 加密：客户端工程师  解密：服务端工程师
		
		// 基础参数校验
		if(empty($headers['sign'])){
		 	throw new ApiException("sign不存在", 400);
		}

		if(!in_array($headers['app_type'], config('app.apptypes'))){
			throw new ApiException("app_type不支持", 400);	
		}
		
		if(!IAuth::checkSignPass($headers)){
			throw new ApiException("授权码sign失败", 401);
			
		}

		Cache::set($headers['sign'],1,config('app.app_sign_cache_time'));

		// sign使用过后 标识一下 1.文件 2.mysql 3.redis 
		$this->headers = $headers;
	}
	
	public function test(){
		$data = [
			'version' => $headers['version'],
			'app_type' => $headers['app_type'],
			'did' => $headers['did'],
			'time' => Time::get13TimeStamp(),
		];
		echo IAuth::setSign($data);exit;

	}
}