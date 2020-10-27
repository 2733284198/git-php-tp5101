<?php


namespace app\index\controller;


class Error
{
    public function _empty()
    {
        return '_empty_error';
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        // TODO: Implement __call() method.
        dump($name);
        dump($arguments);

        $res = [
            'status' => 0,
            'message' => '找不到该方法',
            'status' => null

        ];
//
        return json($res);
    }
}