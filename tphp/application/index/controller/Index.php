<?php
namespace app\index\controller;
 use think\Request;
 use think\Db;
 use think\Controller;
 define('APP_PA', '这是自己定义的常量的值');
class Index extends Controller
{
    public function index()
    {
        /*return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="ad_bd568ce7058a1091"></think>';
    	*/
        $request = Request::instance();
        echo '当前域名'.$request->domain().'<br/>';
		echo '入口文件'.$request->basefile().'<br/>';
        echo '<a href="/tphp/public/index/index/news">跳转</a>';
          
		
    }
    public function index1()
    {
        //赋值给模板变量
        // $name = 'bryan is coming';
        // $email = 'bryan@qq.com';
        // $this->assign('name',$name);
        // $this->assign('email',$email);

        //或者批量赋值
        // $this->assign([
        //     'name' => $name,
        //     'email' => $email
        // ]);
       // return $this->fetch();  //不添加参数会自动定位到该模块文件
                                //默认情况下系统会定位到当前模块/默认视图目录/当前控制器（小写）/当前操作.html
                                //即 index/view/index/index1.html;

        //return $this->fetch('test');//参数为模板名时，系统会去当前控制器下寻找对应模板文件 即index/view/index/test.html

        //return $this->fetch('user/user');//fetch方法支持跨模块操作，表示调用user控制器下的user模块
   
        // return $this->fetch('user/user',[
        //         'name'=>'thinkphp',
        //         'email'=>'thinkphp@qq.com'
        //                 ]);

        //使用助手函数view
        // return view('user/user',[
        //         'name'=>'thinkphp',
        //         'email'=>'thinkphp@qq.com'
        //                 ]);      

        $name = 'hello world';
        $time = time();
        $this->assign('name',$name);
        $this->assign('time',$time);
        return $this->fetch();
    }

    public function list1()
    {
        return $this->fetch();
    }
    public function db()
    {
        //1.原生查询
        // 插入数据
        //$result = Db::execute("insert into think_data(name,status) values('ellen',2)");
        //修改数据
        //$result = Db::execute("update think_data set name='vivi' where name='ellen'");
        //删除数据
        //$result = Db::execute("delete from think_data where name='vivi'");
        //查询数据
        //$result = Db::query('select * from think_data');
        
        //2.利用查询构造器。   避免sql注入（使用PDO参数绑定）

        //插入数据
        //$result = Db::table('think_data')->insert(['name'=>'vivi','status'=>1]);
        //更新数据
        //$result = Db::table('think_data')->where('name','vivi')->update(['name'=>'lily']);
        //查询数据
        //$result = Db::table('think_data')->where('id',1)->select();
        //删除数据
        //$result = Db::table("think_data")->where('id',4)->delete();

        //$result = Db::name('data')->insert(['name'=>'bruce','status'=>1]);//table改为name可以避免前缀，因为已经配置
    
        //$db = db('data');//使用系统提供的助手函数db，每次调用方法都会重新连接数据库，Db：table/name则是单例可以减小内存
        //$db->insert(['name'=>'eric','status'=>'4']);
    
        //链式操作进行复杂的查询
        //$list = Db::name('data')->where('status',1)->field('id,name')->order('id','desc')->limit(3)->select();

        //$list = Db::name("data")->where("name",'like','e%')->select(); 
        $data = [
                ['name'=>'july','status'=>5],
                ['name'=>'august','status'=>3],
        ];
        $result = Db::name('data')->insertAll($data);
        dump($result);

    }
    public function news(){

        echo 'hello news';
    }
    public function read()
    {
        echo '这是通过理由配置文件注册的路由';
    }
    
}
