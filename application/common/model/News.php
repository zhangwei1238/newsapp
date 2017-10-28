<?php
namespace app\common\model;
use think\Model;
 
class News extends Base
{
	/**
	 * 适用于tp自带的分页机制
	 * @param  array  $data [description]
	 * @return [type]       [description]
	 */
 	public function getNews($data = []){
 		$data['status'] = [
 			'neq',config('code.status_delete')
 		];
 		$order = [
 			'id' => 'desc',
 		];
 		$result =  $this->where($data)->order($order)->paginate();
 		//echo $this->getLastSql();
 		return $result;
 	}

 	/**
 	 * 根据条件获取新闻咨询(适用于自定义分页)
 	 * @param  array  $param [description]
 	 * @return [type]        [description]
 	 */
 	public function getNewsByCondition($condition = [],$from,$size){
 		$condition['status'] = [
 			'neq',config('code.status_delete')
 		];
 		$order = [
 			'id' => 'desc',
 		];

 		$result =  $this->where($condition)->order($order)->limit($from,$size)->select();
 		// echo $this->getLastSql();
 		return $result;
 	}

 	/**
 	 * 获取符合条件的新闻总条数
 	 * @param  array  $param [description]
 	 * @return [type]        [description]
 	 */
 	public function getNewsCountByCondition($condition = []){
 		$condition['status'] = [
 			'neq',config('code.status_delete')
 		];
 		return $this->where($condition)->count();
 	}
}