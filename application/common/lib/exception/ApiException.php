<?php 
namespace app\common\lib\exception;
use think\Exception;
/**
* a
*/
class ApiException extends Exception
{
	// http状态码
	public $httpCode = 500 ;
	public $message = '';
	public $code = 0;
	function __construct($message='',$httpCode=0,$code=0){
		$this->httpCode = $httpCode;
		$this->message = $message;
		$this->code = $code;
	}	 
}