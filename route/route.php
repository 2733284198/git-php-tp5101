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

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');

Route::get('index/test2', 'index/test2');

Route::get('index/redis', 'index/redis');
Route::get('index/getredis', 'index/getredis');
Route::get('index/test', 'index/test');

Route::get('tredis/test', 'tredis/test');

# news

Route::get('news/index', 'news/index');
Route::get('news/test', 'news/test');

# solr
Route::get('news/psolr', 'news/psolr');
Route::get('news/psolrdel', 'news/psolrdel');

return [

];
