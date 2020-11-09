<?php


namespace app\index\controller;

use PSolr\Client\SolrClient;
use PSolr\Request as Request;

class News
{
    public function index()
    {
        return 'news-index';
    }

    public function psolr()
    {

// Connect to a Solr server.
        $solr = SolrClient::factory(array(
            'base_url' => 'http://localhost:8983', // defaults to "http://localhost:8983"
            'base_path' => '/solr/product',           // defaults to "/solr"
        ));

        $select = Request\Select::factory()
            ->setQuery('*:*');

//        ->setStart(0)
//            ->setRows(10)
//        ;

        $response = $select->sendRequest($solr);
        $nums =  $response->numFound();

        return json($nums);

//        return 'news-index';
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