<?php
namespace app\index1\controller;
use app\index1\controller\Base;
use app\index1\model\Person as PersonModel;
class Person extends Base
{
	protected $is_check_login = ['*'];//给数组下标为0的数赋值
	public function successlist()
	{
		$data = PersonModel::paginate(3);// 获取对象并设置每页显示条数
		$page = $data->render();//获取分页显示
		$this->assign('data',$data);
		$this->assign('page',$page);
		return $this->fetch();//渲染模板输出
		 
	}
	
}
