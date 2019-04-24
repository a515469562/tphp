<?php
namespace app\index1\controller;
use app\index1\controller\Base;
class Goods extends Base
{
	protected $is_check_login=['*'];
	public function add()
	{
		echo '我想添加商品';
	}
	public function edit()
	{
		echo '我想编辑商品';
	}

}