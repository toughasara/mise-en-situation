<?php

namespace App\Controllers\Auth;

use App\Classes\User;
use App\Models\UserModel;

class AuthControlleur{

    private UserModel $userModel;

    public function __construct($userModel){
        $this->userModel = new UserModel();
    }

    public function adduser($username, $fullname, $password){
        $user = new User(null, $username, $fullname, $password, null);
        $this->userModel->saveuser($user);
    }

    public function loginuser($username, $password){
        $trouveuser = $this->userModel->trouveruser($username, $password);
    }
    
}