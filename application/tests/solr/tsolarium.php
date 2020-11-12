<?php



//$client = new \Solarium\Client();
//
//var_dump($client);

use Solarium\Client;
use Solarium\Core;
use Solarium\Core\Client\Adapter\Curl as CurlAlias;

use Solarium\Core\Plugin\Plugin;
use Solarium\QueryType\Select\Query\Query as Select;
use Symfony\Component\EventDispatcher\EventDispatcher;

//$solr_version = solr_get_version();
//
//print $solr_version;

$adapter = new CurlAlias(); // or any other adapter implementing AdapterInterface

//$eventDispatcher = new \Symfony\Component\EventDispatcher\EventDispatcher();
$eventDispatcher = new EventDispatcher();

$config = array(
    'endpoint' => array(
        'localhost' => array(
            'host' => '127.0.0.1',
            'port' => 8983,
            'path' => '/',
            'core' => 'product',
            // For Solr Cloud you need to provide a collection instead of core:
            // 'collection' => 'techproducts',
        )
    )
);

// create a client instance
$client = new Solarium\Client($adapter, $eventDispatcher, $config);

// get a select query instance
$query = $client->createQuery($client::QUERY_SELECT);

// this executes the query and returns the result
$resultset = $client->execute($query);

// display the total number of documents found by solr
echo 'NumFound: '.$resultset->getNumFound();





