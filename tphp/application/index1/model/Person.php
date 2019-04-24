<?php
namespace app\index1\model;
use think\Model;

class Person extends Model
{
	 
	protected $auto = ['ip','password','repassword'];//数据自动完成操作
	protected function setIpAttr()
	{
		return request()->ip();
		//在表单提交信息时会自动将ip地址写入数据库
	}
	protected function setPasswordAttr($value)
	{
		return md5($value);
		//将传入的参数进行加密
	}

	protected function setRepasswordAttr($value)
	{
		return md5($value);
		//将传入的参数进行加密
	}
}