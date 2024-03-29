<?php

namespace Core\Table;

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

    public function allById(){
        return $this->query("SELECT * FROM {$this->table} ORDER BY id DESC");
    }

    public function extract(string $key, string $value){
        $records = $this->all();
        $return = [];
       $key = 'get' . str_replace(' ', '', ucwords(str_replace('_',' ', $key)));
       $value = 'get' . str_replace(' ', '', ucwords(str_replace('_',' ', $value)));
        //$value = $this->data->$method();
        foreach($records as $v){
            $return[$v->$key()] = $v->$value();
        }
       
        return $return;
    }

    public function find(int $id){
        return $this->query("SELECT * FROM {$this->table}
        WHERE id = ?",
        [$id],
        true
        );
    }

    public function findWithCin(int $cin){
        return $this->query("SELECT * FROM {$this->table}
        WHERE cin = ?",
        [$cin],
        true
        );
    }

    public function create(array $data){
        $sqlParts = [];

        foreach($data as $key => $value){
            $sqlParts[] = "$key = :$key";
        }
        $ok = $this->query("INSERT {$this->table} SET " . (implode(', ', $sqlParts)),
        $data
        );
        if($ok === false){
            throw new Exception("Impossible d'enregistrer sur la table {$this->table}");
            
        }
    }

    public function update(array $data, int $cin){
            $sqlParts = [];
    
            foreach($data as $key => $value){
                $sqlParts[] = "$key = :$key";
            }
            $ok = $this->query("UPDATE {$this->table} SET " . (implode(', ', $sqlParts)) . " WHERE cin = :cin",
            array_merge($data, ['cin' => $cin])
            );
            if($ok === false){
                throw new Exception("Impossible d'enregistrer sur la table {$this->table}");
                
            }
    }

    public function updateById(array $data, int $id){
        $sqlParts = [];

        foreach($data as $key => $value){
            $sqlParts[] = "$key = :$key";
        }
        $ok = $this->query("UPDATE {$this->table} SET " . (implode(', ', $sqlParts)) . " WHERE id = :id",
        array_merge($data, ['id' => $id])
        );
        if($ok === false){
            throw new Exception("Impossible d'enregistrer sur la table {$this->table}");
            
        }
}

    public function delete(int $cin){
        $this->query("DELETE FROM {$this->table} WHERE cin = :cin",
        ['cin' => $cin]);

    }

    public function deleteById(int $id){
       $ok = $this->query("DELETE FROM {$this->table} WHERE id = :id",
        ['id' => $id]);
        
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