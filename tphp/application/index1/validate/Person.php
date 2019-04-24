<?php
namespace app\index1\validate;
use think\Validate;

class Person extends Validate
{
	//手动封装验证类
	protected $rule = [
		'name|用户名' =>'require|min:3',
		'password|密码'=>'require|min:6|confirm:repassword', 
		'email|邮箱'=>'require',
	];
	protected $message = [
		'name.require' => '用户名不能为空',//require方法对应的提示信息
		'name.min' =>'用户名长度不能少于3位',
		'password.require'=>'密码不能为空',
		'password.min'=>'密码长度不能少于6位',
		'password.confirm'=>'两次密码不一致',
		'email.require'=>'邮箱不能为空',
	];

}