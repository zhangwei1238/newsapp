<?php 
/**
* 时间相关
*/
namespace app\common\lib;
class Time
{
	/**
	 * 得到13位时间戳
	 * 这样唯一性强一点
	 * @return string 
	 */
	public static function get13TimeStamp(){
		//ceil 函数向上舍入为最接近的整数
		list($time1,$time) = explode(' ', microtime());
		return $time.ceil($time1*1000); 
	}
}