<?php
namespace app\common\model;
use think\Model;
 
class Base extends Model
{
	
	public function add($data)
	{
		// 判断是否为数组
		if (!is_array($data)) {
			exception('数据格式异常');
		}
		// 过滤字段
		$this->allowField(true)->save($data);
		return $this->id;
	}
}