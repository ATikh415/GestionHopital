<?php

use Core\Router;

require '../vendor/autoload.php';

$router = new Router(dirname(__DIR__) . '/views');

$whoops = new \Whoops\Run;
$whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router
    ->get('/', 'rv/index', 'home')
    ->get('/service', 'service/index', 'service')
    ->run();