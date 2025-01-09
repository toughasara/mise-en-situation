<?php

namespace App\Classes;


class User {
    private $id;
    private $username;
    private $fullname;
    private $password;
    private $created_at;

    public function __construct($id=null, $username, $fullname,  $password, $created_at) {
            $this->id = $id;
            $this->username = $username;
            $this->fullname = $fullname;
            $this->password = $password;
            $this->created_at = $created_at;
    }

    public function getId(){
        return $this->id; 
    }
    public function getUsername(){
        return $this->username;
    }
    public function getFullname(){
        return $this->fullname;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getCreated_at(){
        return $this->created_at;
    }
    
}

?>