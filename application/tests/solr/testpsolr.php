<?php

namespace PSolr;

//require_once '../../../vendor/autoload.php';

namespace PSolr;

use PSolr\Client\SolrClient;
use PSolr\Request as Request;

// Connect to a Solr server.
$solr = SolrClient::factory(array(
    'base_url' => 'http://192.168.3.2:8983', // defaults to "http://localhost:8983"
    'base_path' => '/solr/product',           // defaults to "/solr"
));

$select = Request\Select::factory()
    ->setQuery('*:*')
    ->setStart(0)
    ->setRows(10)
;

$response = $select->sendRequest($solr);
$response->numFound();
