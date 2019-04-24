<?php
namespace app\admin\controller;
use think\Controller;
class Base extends Controller
{
	public function _initialize()
	{
		//控制器初始化方法
		 if(!session('name'))
		 {
		 	$this->error('请先登录系统','Index/login');
		 }
	}

}