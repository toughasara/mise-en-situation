<?php

namespace App\Classes;


class Userrole {
    private $user_id;
    private $role_id;

    public function __construct($user_id, $role_id) {
            $this->user_id = $user_id;
            $this->role_user_id = $role_user_id;
    }

    public function getUser_id(){
        return $this->user_id; 
    }
    public function getRole_id(){
        return $this->role_id;
    }
    
}

?>