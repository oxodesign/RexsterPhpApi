<?php

namespace Empirio\Rexster;
 
class Vertex {
    protected $id;
    protected $path = 'vertices';
    protected $properties = array();

    public function __construct($id = null){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function getProperty($name){
        if(isset($this->properties[$name])){
            return $this->properties[$name];
        }

        return null;
    }

    /**
     * @param $id
     * @return Vertex
     */
    public function setId($id){
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $name
     * @param string $value
     * @return Vertex
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
        return $this->getProperties();
    }

    public function getProperties(){
        return $this->properties;
    }

    /**
     * @param $properties
     * @return Vertex
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
