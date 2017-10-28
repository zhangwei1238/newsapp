<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/**
 * 通用的分页样式
 * @param  [type] $obj [description]
 * @return [type]      [description]
 */
function pagination($obj){
	// 对象不存在
	if(!$obj){
		return '';
	}
	// 获取页面参数信息
	$params = request()->param();
	return '<div class="imooc-app">'.$obj->appends($params)->render().'</div>';
}

/**
 * 根据id获取栏目名称
 * @return [type] [description]
 */
function getCatName($catId){
	if(!$catId){
		return '';
	}
	$config = config('cat.lists');
	return !empty($config[$catId]) ? $config[$catId] : '';
}

/**
 * 是否推荐文案
 * @return [type] [description]
 */
function isYesNo($value){
	return $value ? '<span style="color:red;">是</span>' : '<span>否</span>'; 
}

/**
 * 新闻状态文案
 * @param  [type] $status [description]
 * @return [type]         [description]
 */
function status($id,$status){
	if(!is_numeric($id)){
		$this->error('ID不合法');
	}
	if(!is_numeric($status)){
		$this->error('参数不合法');
	}
	// 获取控制器
	$ctr = request()->controller();
	// 拼接js请求url地址
	$url = url($ctr.'/status',['id'=>$id,'status'=>$status==1?0:1]);
	if($status == 1 ){
		return '<a href="javascript:void(0);" onclick="app_status(this)" title="修改状态" status_url="'.$url.'"><span class="label label-success radius">正常</span></a>';
	}else if($status == 0){
		return '<a href="javascript:void(0);" onclick="app_status(this)" title="修改状态" status_url="'.$url.'"><span class="label label-danger radius">正常</span></a>';
	}
}

 
/**
 * 通用api接口数据输出
 * @param  init $status   业务状态码
 * @param  string $message  信息提示
 * @param  array $data     数据
 * @param  int $httpCode http状态码
 * @return array            
 */
function show($status,$message,$data=[],$httpCode=200){
	$result = [
		'status' => $status,
		'message' => $message,
		'data' => $data,
	];
	return json($result,$httpCode);
}