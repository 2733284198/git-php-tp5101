<?php
namespace app\index\controller;

use think\Controller;

class Base extends Controller
//class Base
{
    public function initialize()
    {
        var_dump('base initialize' );
    }

//    public function __construct()
//    {
//        var_dump('base __construct' );
//    }

    public function _empty()
    {
        return 'base_empty';
    }

}
