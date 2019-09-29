<?php

namespace Core\Database;

use PDO;

class Database{

    private $db_name;
    private $host;
    private $user;
    private $pass;
    private $pdo;

    public function __construct($db_name, $host = 'localhost', $user= 'atikh', $pass ='Passer@415')
    {
        $this->db_name = $db_name;
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
    }

    public function getDB(){
        if($this->pdo === null){
            $pdo = new PDO("mysql:host=localhost;dbname=GestHopital",'atikh', 'Passer@415');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function query(string $sql, ?string $class = null, $one = false){
        $query = $this->getDB()->query($sql);
        if(
            \strpos($sql, 'INSERT') === 0 ||
            \strpos($sql, 'UPDATE') === 0 ||
            \strpos($sql, 'DELETE') === 0 

        ){
            return $query;
        }
        if($class === null){
            $query->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $query->setFetchMode(PDO::FETCH_CLASS, $class);
        }
        if($one){
            $data = $query->fetch();
        }else{
            $data = $query->fetchAll();
        }
        return $data;
    }

    public function prepare(string $sql, $attributes, ?string $class = null, $one = false){
        $req = $this->getDB()->prepare($sql);
        $res = $req->excute($attributes);
        if(
            \strpos($sql, 'INSERT') === 0 ||
            \strpos($sql, 'UPDATE') === 0 ||
            \strpos($sql, 'DELETE') === 0 

        ){
            return $res;
        }

        if($class === null){
            $res->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $res->setFetchMode(PDO::FETCH_CLASS, $class);
        }
        if($one){
            $data = $res->fetch();
        }else{
            $data = $res->fetchAll();
        }
        return $data;
        
    }
}