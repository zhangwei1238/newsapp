<?php 
namespace app\api\controller;
use think\Controller;
use app\common\lib\exception\ApiException;
/**
* 测试
*/
class Test extends Common
{
	
	public function index(){
		return '123456';
	}
	public function update($id = 0){	
		$data = input('put.');
		halt($data);
	}
	public function save(){
		//throw new ApiException("你提交的数据不合法", 400);
		
		$data = input('post.');
		return show(1,'dasd',$data,201);
	}
}