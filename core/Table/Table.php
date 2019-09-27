<?php

namespace Core\Table;

use Core\Database\Database;

class Table{

    private $db;
    private $table;

    public function __construct(Database $db)
    {
        $this->db = $db;
        if($this->table === null){
            $parts = explode('\\', get_class($this));
            $class_name = str_replace('Table', '', end($parts));
            $this->table = strtolower($class_name) . 's';
        }

    }

    public function all(){
    $this->query("SELECT * FROM {$this->table}");
    }

    public function query($sql, $attributes = null, $one = false){
        if($attributes){
            return $this->db->prepare(
                    $sql,
                    $attributes,
                    str_replace('Table', '', get_class($this)),
                    $one
            );
        }else{
            return $this->db->query(
                    $sql,
                    str_replace('Table', '', get_class($this)),
                    $one
                );
        }
    }
}