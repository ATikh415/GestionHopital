<?php

namespace App;

use App\Security\ForbbidenExeption;
class Auth{
    public function check(){
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        if(!isset($_SESSION['auth'])){
            throw new ForbbidenExeption();
        }
    }
}