<?php
namespace app\index\controller;

use think\Controller;
use app\index\controller\Base;

//class Index extends Controller
class Index extends Base
{
    public  $redis;
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

        return 'index-index';
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

        $cache =  \Cache::set("tp-t1", $arr);
        print_r($cache);

        return 'redis';
    }

    public function getredis()
    {
        $cache =  \Cache::get("tp-t1");

        echo 'get-redis:<br>====';
        print_r($cache);

        return 'getdis';

    }

    public function test()
    {
        $redis = new \Redis();

        // set操作
        $redis->connect('127.0.0.1', 6379);
        var_dump($redis->getHost() );

        $this->hashget();

        $redis->zAdd("zset1", 100 , "xiaowang");
        $redis->zAdd("zset1", 90 , "xiaohong");
        $redis->zAdd("zset1", 95 , "xiaoyong");

        $val = $redis->zRange("zset1", 0 , -1);
        var_dump($val);

        $val = $redis->zRevRange("zset1", 0 , -1);
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

        $person = $redis->hMGet("person", ["name", "age"]  );
        $redis->hIncrBy("person", "age", 20);

//        $person = $redis->hGet("person", "name" );
        $person = $redis->hMGet("person", ["name", "age"]  );
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
