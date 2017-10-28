<?php 
/**
* Iauth相关
*/
namespace app\common\lib;
use think\Cache;
class IAuth
{
	/**
	 * 密码加密
	 * @param string $data 密码
	 */
	public static function setPassword($data){
		return md5($data.config('app.password_pre_halt'));
	}

	/**
	 * 生成每次请求的sign算法
	 * @param array $data [description]
	 */
	public static function setSign($data=[]){
		// 1.按字段排序
		ksort($data);
		// 2.拼接字符串 &
		$string = http_build_query($data);
		// 3.aes加密
		$string = (new Aes())->encrypt($string);
		 
		return $string;
	}

	/**
	 * 检查sign是否正常
	 * @param array $data [description]
	 */
	public static function checkSignPass($data){
		$str = (new Aes())->decrypt($data['sign']);
		if(empty($str)){
			return false;	
		} 
		parse_str($str,$arr); 
		if(!is_array($arr) || empty($arr['app_type']) || empty($arr['did']) || empty($arr['version']) || $arr['app_type'] != $data['app_type'] || $arr['did'] != $data['did'] || $arr['version'] != $data['version']  ){
			return false;
		}
		// debug模式关闭时间和缓存判定
		if(!config('app_debug')){
			// 时间超过十秒 验证失败
			if(time()-ceil($arr['time'] / 1000) > config('app.app_sign_time')){
				return false;
			}
			// 唯一性判定
			if(Cache::get($data['sign'])){
				return false;
			}
		}
		return true;
	}
	
}