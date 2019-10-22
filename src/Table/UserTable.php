<?php

namespace App\Table;

use App\Model\User;
use Core\Table\Table;

class UserTable extends Table{
    protected $class = User::class;


    public function findByLogin(string $login){
        return $this->query("SELECT * FROM users u, secretariats s
         WHERE u.id = s.id_users  AND login like :login",
         ['login' => $login], true);
    }


    public function findByMed(string $login){
        return $this->query("SELECT * FROM users u, medecins m
         WHERE u.id = m.id_users  AND login like :login",
         ['login' => $login], true);
    }
}