<?php

namespace App\Classes;


class Role {
    private $id;
    private $name;

    public function __construct($id=null, $name) {
            $this->id = $id;
            $this->name = $name;
    }

    public function getId(){
        return $this->id; 
    }
    public function getName(){
        return $this->name;
    }
    
}

?>