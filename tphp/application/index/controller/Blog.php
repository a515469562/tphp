<?php
namespace app\index\controller;
class Blog
{
	public function index()
	{
		dump('index');
	}
	public function read($id)
	{
		dump('read $id');
	}
	public function edit($id)
	{
		dump('edit $id');
	}
}
