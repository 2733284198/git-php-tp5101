<?php


namespace app\index\controller;


class News
{
    public function index()
    {
        return 'news-index';
    }

    public function test()
    {
        $redis = new \Redis();

        // set操作
        $redis->connect('127.0.0.1', 6379);

        // 获取
        $redis->sAdd('set1', 'A');
        $redis->sAdd('set2', 'B');
        $redis->sAdd('set3', 'C');
        $redis->sAdd('set4', 'D');

        $val = $redis->sCard('set1');
        var_dump($val);

        return json($val);
    }
}