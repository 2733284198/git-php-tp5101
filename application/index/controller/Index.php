<?php
namespace app\index\controller;

use think\Controller;
use app\index\controller\Base;

//class Index extends Controller
class Index extends Base
{
//    public function initialize()
//    {
//        var_dump('Index initialize' );
//    }

//    public function __construct()
//    {
//        var_dump('__construct' );
//    }

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
}
