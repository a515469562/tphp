<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\User;

class Index extends Controller
{

	public function login()
	{
		return $this->fetch();
	}
	public function check()
	{
		$data = input('post.');
		$user = new User();
		$result = $user->where('name',$data['name'])->find();
		if ($result) {
			if($result['password'] === md5($data['password']) ){
				session('name',$data['name']);
			}
			else
			{
				$this->error('密码不正确');
			}
		}
		else{
			$this->error('用户名不存在');
		}
		if(captcha_check($data['code']))
		{
			$this->success('验证码正确，恭喜登陆成功','user/successlist');
		}
		else
		{
			$this->error('验证码不正确');
		}
	}
	public function logout()
	{
		session(null);
		$this->success('退出登录成功','Index/login');
	}
}