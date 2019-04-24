<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use app\admin\model\User as UserModel;
use app\admin\validate\User as UserValidate;
class User extends Base
{

	public function index()
	{
		return $this->fetch();
	}
	public function add()
	{
		return $this->fetch();
	}
	public function successlist()
	{
		// $data = UserModel::all();//获取所有user对象  orm框架
		// $this->assign('data',$data);
		// return $this->fetch();
		//通过分页显示数据
		$data = UserModel::paginate(3);// 获取对象并设置每页显示条数
		$page = $data->render();//获取分页显示
		$this->assign('data',$data);
		$this->assign('page',$page);
		return $this->fetch();//渲染模板输出


	}
	//新增管理员的方法
	public function insert()
	{
		$data = input('post.');//通过该助手函数接受到数据
		$name = UserModel::get(['name'=>$data['name']]);//通过name属性从数据库中获取完整对象信息
		if($name)
		{
			$this->error('用户名重复，请重新输入用户名');
		}
		$val = new UserValidate();
		if(!$val->check($data)){//使用验证类对接受到的数据进行验证
			$this->error($val->getError());//使用框架提供的跳转方法
			exit;//代码到此结束，不执行以下代码
		}
		

		$user = new UserModel($data);//将数据传入到user类中
		$ret = $user->allowField(true)->save();//插入成功判断
		if($ret)
		{
			$this->success('新增管理员成功','user/successlist');
		}
		else
		{
			$this->error('新增管理员失败');//默认会跳转到原来定义的页面
		}

	}
	public function edit()
	{
		//将编辑前的数据渲染在edit.html页面
		$id = input('get.id');
		$data = UserModel::get($id);//通过id获取对象信息
		$this->assign('data',$data);
		return $this->fetch();
	}
	public function update()
	{
		 
		$data = input('post.');
		$id = input('post.id');

		$val = new UserValidate();
		if(!$val->check($data))
		{
			$this->error($val->getError());
			exit;
		}
		$user = new UserModel();
		$ret = $user->allowField(true)->save($data,['id'=>$id]);//通过id来修改为data信息( 
																//通过user模型自动封装data信息+update_time(自动数据))
		if($ret)
		{
			$this->success('修改用户信息成功','user/successlist');
		}
		else
		{
			$this->erroe('修改用户信息失败');
		}
	}

	public function delete()
	{
		$id = input('get.id');
		//$res = UserModel::destroy($id);//通过id进行数据的软删除，本质是添加数据的删除标志，并没有在数据库中删除数据(										获取信息时也没办法获取，从而无法显示软删除过的信息)
										//数据软删除后，delete_time会显示更新
		
		$res = UserModel::destroy($id,true);//真实删除， 将数据从数据库中删除
		if($res)
			$this->success('真实删除用户信息成功','user/successlist');
		else
			$this->error('真实删除用户信息失败');


	}


}
