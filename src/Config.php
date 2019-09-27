<?php

namespace App;

class Config{

    private static $instance;
    private $settings = [];

    public function __construct($file)
    {
        $this->settings = require ($file);
    }

    public static function getInstance($file){
        if(self::$instance === null){
            self::$instance = new Config($file);
        }
        return self::$instance;
    }

    

}