<?php 
namespace app\common\lib\exception;
use think\exception\Handle;
use app\common\lib\exception\ApiException;
/**
* a
*/
class ApiHandleException extends Handle
{
	// http状态码
	public $httpCode = 500 ;
	/**
	 * 重新render 以适应api模块对报错的渲染
	 * @param  Exception $e [description]
	 * @return [type]       [description]
	 */
	public function render(\Exception $e)
    {
    	// 如果我开启了debug模式
    	if(config('app_debug') == true){
    		return parent::render($e);
    	}
    	if ($e instanceof ApiException){	
     	   $this->httpCode = $e->httpCode;
    	}
    	return show(0,$e->getMessage(),[],$this->httpCode);
    }	 
}