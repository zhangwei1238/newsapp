<?php
namespace app\admin\controller;
use think\Controller;
class News extends Base
{
	public function index(){
		// 获取分页信息 
		$data = input('param.');
		// 将查询条件转换成查询字符串
		$query = http_build_query($data);
		$whereData = [];
		// 查询条件
		if(!empty($data['start_time']) && !empty($data['end_time']) && $data['end_time']>$data['start_time']){
			$whereData['create_time'] = [
				['gt',strtotime($data['start_time'])],
				['lt',strtotime($data['end_time'])]
			];
		}
		if(!empty($data['catid'])){
			$whereData['catid'] = intval($data['catid']);
		}
		if(!empty($data['title'])){
			$whereData['title'] = [
				'like','%'.$data['title'].'%',
			];
		}
		// 第页数 每页显示条数
		$this->getPageAndSize($data);
		$news = model('News')->getNewsByCondition($whereData,$this->from,$this->size);
		// 获取满足条件的总数
		$total = model('News')->getNewsCountByCondition($whereData);
		$totalPage = ceil($total/$this->size); // 1.1 => 2
		$status = config('code');
		$cats = config('cat.lists');
		return $this->fetch('',[
			'news' => $news,
			'cats' => $cats,	
			'totalPage' => $totalPage,
			'curr' => $this->page,
			'start_time' => empty($data['start_time']) ? '' : $data['start_time'],
			'end_time' => empty($data['end_time']) ? '' : $data['end_time'],
			'catid' => empty($data['catid']) ? 0 : $data['catid'],
			'title' => empty($data['title']) ? '' : $data['title'],
			'query' => empty($query) ? '' : $query,
			'status' => $status,
		]);
	}

    public function add(){
    	if(request()->isPost()){ 
    		$data = input('post.');	
    		// 数据validate校验
 
    		if(!empty($data['id'])){
    			return $this->save($data);
    		}
    		try {
    			$id = model('News')->add($data);
    		} catch (\Exception $e) {
    			$this->result('',0,'新增失败');
    		}
    		if($id){
    			$this->result(['jump_url'=>url('news/index')],1,'新增成功');
    		}else{
    			$this->result('',0,'新增失败');
    		}
    	}else{
	    	return $this->fetch('',[
	    		'cats' => config('cat.lists'),
	    	]);
	    }
    }

    public function edit($id){
    	if(empty($id)){
    		$this->error('ID不合法');	
    	}
    	if(!is_numeric($id)){
			$this->error('ID不合法');	
    	}
    	try {
    		$new = model('News')->get(intval($id));
    	} catch (\Exception $e) {
    		$this->error($e->getMessage());
    	}
    	
    	$cats = config('cat.lists');
    	return $this->fetch('',[
    		'cats' => $cats,
    		'new' => $new,
    	]);
    }

    public function save($data){
    	try {
    		$res = model('News')->save($data,['id'=>$data['id']]);	
    	} catch (\Exception $e) {
    		$this->result('',0,'更新失败');
    	}
    	if($res){
    		$this->result(['jump_url'=>url('news/index')],1,'更新成功');
    	}else{
    		$this->result('',0,'更新失败');
    	}
    }

}
