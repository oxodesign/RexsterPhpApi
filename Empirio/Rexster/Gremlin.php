<?php

namespace Empirio\Rexster;

class Gremlin{

    protected $id;
    protected $path = 'tp/gremlin';

    /**
     * @var Server
     */
    protected $server;
    /**
     * @var Graph
     */
    protected $graph;

    public function __construct($server, $graph){
        $this->server = $server;
        $this->graph = $graph;
    }

    public function command($cmd){
        $server   = $this->server->getLocation();
        $graph    = $this->graph->getGraph();
        $location = $server . '/' . $graph . '/' . $this->path;

        $response = $this->server->getClient()->post($location, http_build_query(array('script' => $cmd)));
        $output   = json_decode($response->getBody());

        return $output->results;
    }

    public function getPath(){
        return $this->path;
    }

}
 
