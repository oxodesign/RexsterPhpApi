<?php

require_once 'bootstrap.php';

$client  = new Congow\Orient\Http\Client\Curl();
$rexster = new Empirio\Rexster\Server($client,'asweb2');
$graph   = $rexster->getGraph('rexster');
$gremlin  = new Empirio\Rexster\Gremlin($rexster, $graph);

// Inserting a new node/vertex
//$john = new Empirio\Rexster\Vertex();
//$john->setProperty('name', 'John')
//     ->setProperty('age', '19')
//     ->setProperty('city', 'Oslo');
//
//$graph->save($john);

// Get a node/vertex by id
//$john = $graph->getVertexById('5:5');
//echo $john->getProperty('name');
//
//$tom = $graph->getVertexById('5:2');
//echo $tom->getProperty('name');
//
// Create edge with label "friends" and add an property with name "since"
//$edge = new Empirio\Rexster\Edge($john, $tom, 'friends');
//$edge->setProperty('since', '2005');
//
//$graph->save($edge);

// Using gremlin
//$vertexes = $gremlin->command('g.E.filter{it.label=="friends"}.outV.uniqueObject');
//foreach($vertexes as $vertex){
//    echo $vertex->name;
//}

