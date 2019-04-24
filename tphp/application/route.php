<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
Route::get('/',function(){
	//首页的路由规则采用/定义即可
	return 'hello world route';
});
Route::rule('new/:id','index/Index/news');
//动态注册路由

Route::resource('blog','index/blog');
//资源路由 表示注册了一个名称为 blog 的资源路由到 index 模块的 Blog 控制器，系统会自动注册七个路由规则，（对应操作方法）

Route::controller('detail','index/detail');
//快捷路由  允许你快速给控制器注册路由，并且针对不同的 请求类型 可以设置  方法前缀

return [
//定义路由配置文件
	'news/:id' => 'index/Index/read',
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
