<?php

namespace Core\Table;

class Table{

    private $db;
    private $table;

    public function __construct(Database $db)
    {
        $this->bd = $db;
        if($this->table === null){
            $parts = explode('\\', get_class($this));
            $class_name = str_replace('Table', '', end($parts));
            $this->table = strtolower($class_name) . 's';
        }

    }
}