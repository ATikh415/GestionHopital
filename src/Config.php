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

    public function get($key){
        if(isset($this->settings[$key])){
            return $this->settings[$key];
        }
        return null;
    }



}