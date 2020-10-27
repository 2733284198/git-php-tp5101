<?php

$arr = [
    'name0'=> 'name1',
    'name1'=> 'name1',
    'name2'=> 'name1',
    'name3'=> 'name1'
];

$news = [
    [
        'title'=>'title1'
    ],
    [
        'title'=>'title2'
    ],
    [
        'title'=>'title3'
    ]
];

ob_start();

require_once('template.html');

//echo '1';
//echo '2';

//print_r($arr);


//echo ob_get_contents();

file_put_contents('index.shtml', ob_get_contents());

