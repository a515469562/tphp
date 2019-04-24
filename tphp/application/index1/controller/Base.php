<?php
namespace app\index1\controller;
use think\Controller;
use think\Request;
class Base extends Controller
{
	//用来存放需要用户登陆之后才能操作的方法的集合
		protected $is_check_login=[''];
	public function _initialize()
	{	  
		if(!$this->isLogin() && $this->is_check_login[0] == '*' )
		{
			//在session中没有name属性条件下，继承base类的class下所有方法都涉及

			//in_array(Request::instance()->action(), $this->is_check_login)可以手动设置is_check_login数组的方法集合；
			//session中没有name属性，且需要访问的action属于$is_check_login方法集合，
			return $this->error('请先登录系统','index1/index/login');
		}
		
	}
	public function isLogin()
	{
		return session('?name');
	}

}
