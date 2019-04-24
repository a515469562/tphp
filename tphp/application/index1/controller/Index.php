<?php
namespace app\index1\controller;
use think\Controller;
use app\index1\model\Person as PersonModel;
use app\index1\validate\Person as PersonValidate;
class Index extends Controller
{

	public function index()
	{
		return $this->fetch();
	}
	public function login()
	{
		return $this->fetch();
	}
	public function logout()
	{
		session(null);
		$this->success('退出登录成功','Index/login');
	}

	public function check()
	{
		$data = input('post.');
		$person = new PersonModel();
		$result = $person->where('name',$data['name'])->find();
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
			$this->success('验证码正确，恭喜登陆成功','person/successlist');
		}
		else
		{
			$this->error('验证码不正确');
		}
	}
	public function insert()
	{
		$data = input('post.');
		$name = PersonModel::get(['name'=>$data['name']]);//通过name属性从数据库中获取完整对象信息
		if($name)
		{
			$this->error('用户名重复，请重新输入用户名');
		}
		$val = new PersonValidate();
		if(!$val->check($data)){//使用验证类对接受到的数据进行验证
			$this->error($val->getError());//使用框架提供的跳转方法
			exit;//代码到此结束，不执行以下代码
		}
		

		$user = new PersonModel($data);//将数据传入到user类中
		$ret = $user->allowField(true)->save();//插入成功判断
		if($ret)
		{
			$this->success('新增用户成功','index/login');
		}
		else
		{
			$this->error('新增用户失败');//默认会跳转到原来定义的页面
		}

	}

}

