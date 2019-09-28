<?php

namespace Core\Table;

use App\Model\Service;
use Core\Database\Database;

class Table{

    protected $db;
    protected $table;
    protected $class;

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
    return $this->query("SELECT * FROM {$this->table}");
    }

    public function query($sql, $attributes = null, $one = false){
        if($attributes){
            return $this->db->prepare(
                    $sql,
                    $attributes,
                    $this->class,
                    $one
            );
        }else{
            return $this->db->query(
                    $sql,
                    $this->class,
                    $one
                );
        }
    }
}