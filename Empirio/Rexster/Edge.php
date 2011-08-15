<?php

namespace Empirio\Rexster;
 
class Edge {

    protected $id;
    
    protected $path = 'edges';
    protected $properties = array();

    protected $_label;
    protected $_outVertex;
    protected $_inVertex;

    public function __construct($outVertex, $inVertex, $label){
        $this->setOutVertex($outVertex)
             ->setInVertex($inVertex)
             ->setLabel($label);
    }

    public function getId(){
        return $this->id;
    }

    public function getInVertex(){
        return $this->_inVertex;
    }

    public function getLabel(){
        return $this->_label;
    }

    public function getProperty($name){
        if(isset($this->properties[$name])){
            return $this->properties[$name];
        }

        return null;
    }

    public function getOutVertex(){
        return $this->_outVertex;
    }

    /**
     * @param $id
     * @return Edge
     */
    public function setId($id){
        $this->id = $id;

        return $this;
    }

    /**
     * @param $vertex
     * @return Edge
     */
    public function setOutVertex($vertex){
        $this->_outVertex = $vertex;

        return $this;
    }

    /**
     * @param $vertex
     * @return Edge
     */
    public function setInVertex($vertex){
        $this->_inVertex = $vertex;

        return $this;
    }

    /**
     * @param $value
     * @return Edge
     */
    public function setLabel($value){
        $this->_label = $value;

        $this->properties['_label'] = $value;

        return $this;
    }

    /**
     * @param string $name
     * @param string $value
     * @return Edge
     */
    public function setProperty($name, $value){
        $this->properties[$name] = $value;

        return $this;
    }

    public function getPath(){
        if($this->id != null)
            return $this->path . '/' . $this->id;

        return $this->path;
    }

    public function getPostFields(){
        $properties = $this->getProperties();

        $properties['_outV'] = $this->getOutVertex()->getId();
        $properties['_inV'] = $this->getInVertex()->getId();

        return $properties;
    }

    public function getProperties(){
        return $this->properties;
    }

    /**
     * @param array $properties
     * @return Edge
     */
    public function setProperties($properties){
        foreach($properties as $key => $property){
            if($key == '_id'){
                $this->setId($property);
                
                continue;
            }

            $this->properties[$key] = $property;
        }

        return $this;
    }
}
