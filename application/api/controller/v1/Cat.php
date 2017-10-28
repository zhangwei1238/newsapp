<?php 
namespace app\api\controller\v1;
use think\Controller;
use app\api\controller\Common;
use app\common\lib\exception\ApiException;
/**
* 分类类
*/
class Cat extends Common
{
	public function read(){
		$cat = config('cat.lists');
		$result[] = [
			'catid' => 0,
			'catname' => '首页',
		];
		foreach ($cat as $key => $value) {
			$result[] = [
				'catid' => $key,
				'catname' => $value,
			];
		}
		return show(config('code.success'),'OK',$result,200);
	}
	 
}