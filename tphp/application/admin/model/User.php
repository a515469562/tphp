<?php
namespace app\admin\model;
use think\Model;
use traits\model\SoftDelete;
class User extends Model
{
	use SoftDelete; 
	protected static $deleteTime = 'delete_time';//软删除的作用是把数据加上删除标记，而不频繁删除数据影响性能
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