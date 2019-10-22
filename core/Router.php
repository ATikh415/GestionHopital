<?php

namespace Core;

use AltoRouter;
use App\Security\ForbbidenExeption;

class Router{

    private $viewPath;
    private $router;

    public function __construct(string $viewPath)
    {
        $this->viewPath = $viewPath;
        $this->router = new AltoRouter();
    }

    public function get(string $url, string $view, ?string $name = null): self
    {
        $this->router->map('GET', $url, $view, $name);
        return $this;
    }

    public function post(string $url, string $view, ?string $name = null):self
    {
        $this->router->map('POST', $url, $view, $name);
        return $this;
    }

    public function match(string $url, string $view, ?string $name = null):self
    {
        $this->router->map('POST|GET', $url, $view, $name);
        return $this;
    }

    public function url(string $name, array $params = []){
        return $this->router->generate($name, $params );
    }

    public function run(): self
    {
           
        $match = $this->router->match();
        $view = $match['target'] ?: 'e404';
        $params = $match['params'];
        $router = $this;
        $layout = 'layouts/default';
      
        if(strpos($view, 'admin/') !== false){
            $layout = 'admin/layouts/default';
        }
        if(strpos($view, 'secretary/') !== false){
            $layout = 'secretary/layouts/default';
        }
        if(strpos($view, 'doctor/') !== false){
            $layout = 'doctor/layouts/default';
        }
        try{
            \ob_start();
            require $this->viewPath . DIRECTORY_SEPARATOR . $view . '.php';
            $content = \ob_get_clean();
            require $this->viewPath . DIRECTORY_SEPARATOR . $layout . '.php';
        }catch(ForbbidenExeption $e){
            header('location: ' . $router->url('login') . '?forbidden=1');
        }
       
        
        return $this;
    }

}