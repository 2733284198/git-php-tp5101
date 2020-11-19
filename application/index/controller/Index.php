<?php

namespace app\index\controller;

use MongoDB\Driver\Query;
use think\Controller;
use app\index\controller\Base;
use think\Db;

//class Index extends Controller
class Index extends Base
{
    public $redis;
//    public function initialize()
//    {
//        var_dump('Index initialize' );
//    }

//    public function __construct()
//    {
//        var_dump('__construct' );
//    }

    public function initialize()
    {
        $this->redis = new \Redis();

        // set操作
        $this->redis->connect('127.0.0.1', 6379);
//         var_dump( $this->redis);
    }

    public function _empty()
    {
        return '_empty';
    }

    public function index()
    {
//        $path = request()->getModulePath();
//        var_dump($path);

//        $this->getmycat_t1();
        $this->getmycat_orders();
        $this->mycat_ordersinsert();
        $this->getmycat_orders();

//        $this->mycat_insert();
//        $this->getmycat_db21();

//        $this->getmycat_db22();

        return 'index-index';
    }

    public function getmycat_orders()
    {
        echo 'index-getmycat_orders<br><hr>';

//        $res = DB::name("tt1")->select();
//        $res = db::query("select * from tt1   limit 5");
        $res = Db::query("select * from orders");
        var_dump($res);


    }

    public function mycat_ordersinsert()
    {
        echo 'index-mycat_insert<br><hr>';

        $content = [
//            'id' => 'next value for MYCATSEQ_COMPANY',
            'id' => '"next value for MYCATSEQ_GLOBAL"',

//            "id"=>"next value for MYCATSEQ_GLOBAL",
            'title' => 'tp51-t1',
        ];
        $sql = " insert into orders(id,title)values(next value for MYCATSEQ_GLOBAL,'tp-93')";

        $res =  Db::query($sql);

        var_dump($res);

        // tt1
//        $insertID = Db::name('orders')->insertGetId($content);
//        var_dump($insertID);

        $sql = Db::name('orders')->getLastSql();
        var_dump($sql);
    }

    public function getmycat_t1()
    {
        echo 'index-getmycat<br>';

//        $res = DB::name("tt1")->select();
//        $res = db::query("select * from tt1   limit 5");
        $res = db::query("select * from t1 ");
        var_dump($res);

    }

    public function getmycat_db22()
    {
        echo 'index-getmycat_db22<br>';

        $res = DB::name("tt21")->limit(5);
        var_dump($res);

        $res = DB::name("tt22")->limit(5);
        var_dump($res);

        $res = DB::name("tt23")->limit(5);
        var_dump($res);

        echo 'index-getmycat_db22<br>';
    }

    public function getmycat_db21()
    {
        echo 'index-getmycat<br>';

//        $res = DB::name("tt1")->select();
//        $res = db::query("select * from tt1   limit 5");
        $res = db::query("select * from tt1 ");
        var_dump($res);

//        $res = DB::name("tt2")->select();
//        var_dump($res);

//        $res = DB::name("tt3")->select();
//        var_dump($res);

        echo 'index-getmycat<br>';
    }

    public function mycat_insert()
    {
        echo 'index-mycat_insert<br><hr>';

        $content = [
            'title' => 'tt1-2',
            'content' => 'tt1-2',
        ];

        // tt1
        $insertID = Db::name('tt1')->insertGetId($content);
        var_dump($insertID);

        $sql = Db::name('tt1')->getLastSql();
        var_dump($sql);

        // tt2
        $insertID = Db::name('tt2')->insertGetId($content);
        var_dump($insertID);

        $sql = Db::name('tt2')->getLastSql();
        var_dump($sql);

        // tt3
        $insertID = Db::name('tt3')->insertGetId($content);
        var_dump($insertID);

        $sql = Db::name('tt3')->getLastSql();
        var_dump($sql);

        echo 'index-mycat_insert<br><hr>';
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }

    public function test2()
    {
        return 'test2';
    }

    public function redis()
    {
        $arr = [
            'name' => 'name1',
            'age' => 12
        ];

        $cache = \Cache::set("tp-t1", $arr);
        print_r($cache);

        return 'redis';
    }

    public function getredis()
    {
        $cache = \Cache::get("tp-t1");

        echo 'get-redis:<br>====';
        print_r($cache);

        return 'getdis';

    }

    public function test()
    {
        $redis = new \Redis();

        // set操作
        $redis->connect('127.0.0.1', 6379);
        var_dump($redis->getHost());

        $this->hashget();

        $redis->zAdd("zset1", 100, "xiaowang");
        $redis->zAdd("zset1", 90, "xiaohong");
        $redis->zAdd("zset1", 95, "xiaoyong");

        $val = $redis->zRange("zset1", 0, -1);
        var_dump($val);

        $val = $redis->zRevRange("zset1", 0, -1);
        var_dump($val);
    }

    private function zget()
    {

    }

    private function hashget()
    {
        $redis = $this->redis;

        // 获取
        $redis->hSet("person", "name", "manlan");
        $redis->hSet("person", "age", 12);
        $redis->hSet("person", "phone", "13104884554");
        $redis->hSet("person", "sex", "male");

//        $this->hashget();

        $person = $redis->hMGet("person", ["name", "age"]);
        $redis->hIncrBy("person", "age", 20);

//        $person = $redis->hGet("person", "name" );
        $person = $redis->hMGet("person", ["name", "age"]);
        var_dump($person);
    }

    private function hset()
    {
        $redis = $this->redis;

        // 获取
        $redis->sAdd('set1', 'A');
        $redis->sAdd('set1', 'B');
        $redis->sAdd('set1', 'C');
        $redis->sAdd('set1', 'D');
        $redis->sAdd('set1', 'E');
        $redis->sAdd('set1', 'F');

        $val = $redis->sCard('set1');
        var_dump($val);

//        return json($val);
    }


    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        dump($name);
        dump($arguments);

        $res = [
            'status' => 0,
            'message' => '找不到该方法',
            'status' => null

        ];

//        return json($res);
    }

}
