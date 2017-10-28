<?php
namespace app\admin\controller;
use think\Controller;
use app\common\lib\IAuth;
class Login extends Base
{
    // 清空Base类的初始化，避免重定向循环
    public function _initialize(){

    }
    public function index()
    {
        return  $this->fetch();
    }

    /**
     * 登陆相关信息
     * @return [type] [description]
     */
    public function check(){
        if(request()->isPost()){
            $data = input('post.');
            $validate = validate('AdminUser');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            if(!captcha_check($data['code'])){
                $this->error('验证码错误');
            }
            try{
                $user = model('AdminUser')->get(['username'=>$data['username']]);
            }catch(\Exception $e){
                $this->error($e->getMessage());
            }
            if(!$user || $user->status != config('code.status_normal')){
                $this->error('账号不存在');
            }
            if($user->password != IAuth::setPassword($data['password'])){
                $this->error('密码错误');
            }
            // 更新登陆时间 登陆ip
            $updata = [
                'last_login_time' => time(),
                'last_login_ip' => request()->ip(),
            ]; 
            try{
                $res= model('AdminUser')->save($updata,['id' => $user->id]);
            }catch(\Exception $e){
                $this->error($e->getMessage());
            }
            // 生成用户session信息
            session(config('admin.session_user'),$user,config('admin.session_user_scope'));

            $this->success('登陆成功','index/index');
        }else{
            $this->error('请求不合法');
        }

    }

    /**
     * 退出登录
     * @return [type] [description]
     */
    public function logout(){
    	session(null,config('admin.session_user_scope'));
        $this->redirect('login/index');
    }
 
}
