<?php 
namespace app\common\validate;
use think\Validate;

class AdminUser extends Validate
{
	
	protected $rule=[
		'username|用户名' => 'require|max:20',
		'password|密码' => 'require|max:20',
		'code|验证码' => 'require',
	];
	protected $scene = [
        'add'  =>  ['name','password'],
    ];
}