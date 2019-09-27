<?php

namespace App;

class App{

    private static $instance;
    private $dbInstance;

    public function getInstance(){
        if(self::$instance === null){
            self::$instance = new App();
        }
        return self::$instance;
    }
}