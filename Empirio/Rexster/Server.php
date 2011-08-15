<?php
/**
 * PHP class for Rexster REST API
 *
 * @pakage Rexter
 * @author Flamur Mavraj <fm@oxodesign.no>
 */
namespace Empirio\Rexster;

use Congow\Orient\Contract\Http;

class Server {

    protected $client;
    protected $location;

    protected $username;
    protected $password;

    protected $graph;


    public function __construct(\Congow\Orient\Contract\Http\Client $client, $host = 'localhost', $port = '8182'){
        $this->client = $client;
        $this->location = $host . ($port ? sprintf(':%s', $port) : false);
    }

    public function getAllGraphs(){
        $response   = $this->client->get($this->location);
        $output     = json_decode($response->getBody());
        
        return $output->graphs;
    }

    /**
     * @return \Congow\Orient\Contract\Http\Client
     */
    public function getClient(){
        return $this->client;
    }

    public function getLocation(){
        return $this->location;
    }

    public function getServer(){
        return $this->server;
    }

    /**
     * @param string $graph
     * @return Server
     */
    public function setGraph($graph){
        $this->graph = new Graph(
            $this,
            $graph
        );

        return $this;
    }

    /**
     * @param string $graph
     * @return Graph
     */
    public function getGraph($graph){
        if($this->graph instanceof Graph){
            if($this->graph->getGraph() !== $graph){
                $this->setGraph($graph);
            }
        }else{
             $this->setGraph($graph);
        }
        
        return $this->graph;
    }
}
