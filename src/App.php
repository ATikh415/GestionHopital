<?php

namespace App;

use Core\Database\Database;

class App{

    private static $instance;
    private $dbInstance;

    public function getInstance(){
        if(self::$instance === null){
            self::$instance = new App();
        }
        return self::$instance;
    }

    public function getTable($name){
        $class_name = '\\App\\Table' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }

    public function getDb(){
        $config = Config::getInstance(ROOT .'/config/config.php');
        if($this->dbInstance === null){
            $this->dbInstance = new Database($config->get('db_name'), $config->get('db_host'), $config->get('db_user'), $config->get('db_pass'));

        }
        return $this->dbInstance;
    }
}