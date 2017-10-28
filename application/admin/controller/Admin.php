<?php
namespace app\admin\controller;
use think\Controller;
use app\common\lib\IAuth;
class Admin extends Base
{
    public function index(){
        return  $this->fetch();
    }

    public function welcome(){
    	return '欢迎访问';
    }

    public function add(){
    	// 判断是否是post提交
    	if(request()->isPost()){
    		$data = input('post.');
    		// 数据校验
    		$validate = validate('AdminUser');
    		if(!$validate->scene('add')->check($data)){
    			$this->error($validate->getError());
    		}
    		// md5加密密码
    		$data['password'] = IAuth::setPassword($data['password']);   		
    		try {
    			$id = model('AdminUser')->add($data);
    		} catch (\Exception $e) {
    			$this->error($e->getMessage());
    		}
    		if($id){
    			$this->success('id='.$id.'的管理员添加成功');	
    		}else{
    			$this->error('管理员添加失败，请重试');
    		}
    	}else{
    		return $this->fetch();
    	}
    }
}
