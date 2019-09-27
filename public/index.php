<?php

use Core\Router;

require '../vendor/autoload.php';

define('ROOT',dirname(__DIR__));
$router = new Router( ROOT . '/views');

$whoops = new \Whoops\Run;
$whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router
    ->get('/', 'rv/index', 'home')
    ->get('/service', 'service/index', 'service')
    ->run();