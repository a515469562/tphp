<?php
namespace app\index\controller;
use app\index\model\User as UserModel;
use think\Controller;

class User extends Controller{
	//模型定义
	//新增一条数据的方法
	public function add()
	{
		 // $user = new UserModel();
		 // $user->name = '流云';
		 // $user->email = 'liuyun@qq.com';
		 // $user->birthday = strtotime("1989-12-11");
		 // if($user->save())
		 // {
		 // 	return '用户新增成功';
		 // }
		 // else
		 // {
		 // 	return '用户新增失败';
		 // }

		 $user['name'] = 'bryan';
		 $user['email'] = '5154@qq.com';
		 $user['birthday'] = strtotime('1996-09-21');
		 if($result = UserModel::create($user))
		 {
		 	return '用户新增成功';
		 }
		 else
		 {
		 	return '用户新增失败';
		 }
	}
	public function addList()
	{
		$user = new UserModel();
		$list = [
			['name'=>'张三','email'=>'3490@qq.com','birthday'=>strtotime("1989-09-12")],
			['name'=>'李四','email'=>'4301@qq.com','birthday'=>strtotime("1999-08-11")],
		];
		if($user ->saveAll($list)){
			return '批量插入成功';
		}
		else
		{
			return '批量插入失败';
		}

	}
	public function update()
	{

		// $user = UserModel::get(1);
		// dump($user);
		// $user->name='安迪';
		// $user->email='andi@qq.com';
		// if($user ->save()){
		// 	return '更新数据成功';
		// }
		// else
		// {
		// 	return '更新数据失败';
		// }
		//$user->save(['name'=>'february','email'=>'february@qq.com'],['id'=>1]);

		//批量更新
		// $user = new UserModel();
		// $list = [
		// 		['id'=>1,'name'=>'april'],
		// 		['id'=>2,'name'=>'may'],
		// ];
		// $user->saveAll($list);

		// $user->update(['id'=>1,'name'=>'cris']);

		UserModel::update(['id'=>1,'name'=>'sunday']);//静态更新

	}
	public function select()
	{
		//获取单个数据
		//$user = UserModel::get(2);//通过主键获取
		//echo $user->name;

		// $user = UserModel::get(['name'=>'张三']);//通过数组获取
		// echo $user->email;
	
		// $user = new UserModel();
		// $result = $user->where("name",'may')->find();//返回一条记录
		// echo $result->email;

		//获取多个数据
		// $list = UserModel::all([1,2,3]);
		// foreach ($list as $key => $value) {
		// 	echo $value->name.'<br/>';
		// }

		$user = new UserModel();
		$result = $user->where('status',1)->limit(2)->order('id','desc')->select();
		foreach ($result as $key => $value) {
			echo $value['name'].'<br/>';
		}
		//聚合函数的调用
		$user = new UserModel();
		echo $user->Count('id');

		// dump(strtotime('1991-01-21'));//将字符串转换成int类型
	}
	public function delete()
	{
		// $user = UserModel::get(1);
		// if($user->delete())
		// {
		// 	return '数据删除成功';
		// }
		// else
		// {
		// 	return '数据删除失败';
		// }


		// if(UserModel::destroy(2))//根据主键删除
		// {
		// 	return '数据删除成功';
		// }
		// else
		// {
		// 	return '数据删除失败';
		// }
		
		//UserModel::destroy([3,4]);//批量删除
		 // UserModel::destroy(['name'=>'bryan']);
		//$result = UserModel::where('id','>',5)->delete();
		 

	}

	public function list1()
	{
		$list = UserModel::all();
		 $this->assign('list',$list);
		 return $this->fetch();
	}

}