<?php
/**
 * PHP class for Rexster REST API
 *
 * @pakage Rexter
 * @subpakage Rexster\Graph
 * @author Flamur Mavraj <fm@oxodesign.no>
 */

namespace Empirio\Rexster;
 
class Graph {

    protected $graph;
    /**
     * @var Server
     */
    protected $server;
    
    public function __construct($server, $graph){
        $this->server = $server;
        $this->graph = $graph;
    }

    public function getGraph(){
        return $this->graph;
    }

    /**
     * @param $id
     * @return Vertex
     */
    public function getVertexById($id){
        $vertex = new Vertex($id);

        $server = $this->server->getLocation();
        $graph  = $this->getGraph();
        $path   = $vertex->getPath();

        $location = $server . '/' . $graph . '/' . $path;
        $response = $this->server->getClient()->get($location);
        $output   = json_decode($response->getBody());

        $vertex->setProperties($output->results);

        return $vertex;
    }
  
    /**
     * @param $record
     * @return Graph
     */
    public function save($record){

        $server = $this->server->getLocation();
        $graph  = $this->getGraph();
        $path   = $record->getPath();

        $location = $server . '/' . $graph . '/' . $path;
        $fields   = $record->getPostFields();

        $response = $this->server->getClient()->post($location, http_build_query($fields));
        $output   = json_decode($response->getBody());
        
        $record->setProperties(array('_id', $output->results->_id));

        return $this;
    }
}
