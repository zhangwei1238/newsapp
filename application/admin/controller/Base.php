<?php
namespace app\admin\controller;
use think\Controller;
class Base extends Controller
{

    // 第几页
    public $page = '';
    // 每页显示多少条
    public $size = '';
    public $from = 0;
    // 定义model
    public $model = '';
    public function _initialize()
    {
    	$isLogin = $this->isLogin();
    	if(!$isLogin){
    		$this->redirect('login/index');
    	} 
    }

    public function isLogin(){
    	$user = session(config('admin.session_user'),'',config('admin.session_user_scope'));
    	if($user && $user->id){
    		return true;
    	}else{
    		return false;
    	}
    }

    public function getPageAndSize($data){
        $this->page = !empty($data['page']) ? $data['page'] : 1;
        $this->size = !empty($data['size']) ? $data['size'] : config('paginate.list_rows');
        $this->from = ($this->page-1) * $this->size;
    }

    public function status(){
        // 开启url_common_param后才可以使用get获取到,否则使用param获取
        $data = input('param.');
        if(empty($data['id'])){
            $this->result('',0,'ID不合法');    
        }
        if(!is_numeric($data['id'])){
            $this->result('',0,'ID不合法');    
        }
        if(!is_numeric($data['status'])){
            $this->result('',0,'参数不合法');    
        }
        // 获取控制器
        // 如果控制器名和表名一样 news news
        // 如果不一样  在控制器中需要定义model
        $this->model = $this->model ? $this->model : request()->controller();
        //如果是php7  $this->model = $this->model ?? request()->controller();
        $res = model($this->model)->get($data['id']);
        if(!$res){
            $this->result('',0,'ID不存在');     
        }
        try{
            $res = model($this->model)->save(['status'=>$data['status']],['id'=>$data['id']]);
        }catch(\Exception $e){
            $this->result('',0,$e->getMessage());    
        }
        if($res){
            $this->result(['jump_url'=>$_SERVER['HTTP_REFERER']],1,'更新成功');
        }
        $this->result('',0,'更新失败'); 
    }

    /**
     * 通用化删除
     * @return [type] [description]
     */
    public function delete($id=0){
        if(!intval($id)){
            $this->result('','0','ID不合法');
        }
        $this->model = $this->model ? $this->model : request()->controller();
        // 判断id是否存在
        $res = model($this->model)->get($id);
        if(!$res){
            $this->result('',0,'ID不存在');       
        }
        try{
            $res = model($this->model)->save(['status'=>config('code.status_delete')],['id'=>$id]);
        }catch(\Exception $e){
            $this->result('',0,$e->getMessage());    
        }
        if($res){
            $this->result(['jump_url'=>$_SERVER['HTTP_REFERER']],1,'删除成功');
        }
        $this->result('',0,'删除失败');       
    }
}
