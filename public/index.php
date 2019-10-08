<?php

use Core\Router;

require '../vendor/autoload.php';

define('ROOT',dirname(__DIR__));
$router = new Router( ROOT . '/views');

$whoops = new \Whoops\Run;
$whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router
    //RENDEZ-VOUS
    ->get('/', 'rv/index', 'home')
    ->get('/', 'e404', 'e404')
    ->match('/rv/new', 'rv/new', 'rv_new')
    ->post('/rv/delete', 'rv/delete', 'rv_delete')
    ->match('/rv/edit/[i:id]', 'rv/edit', 'rv_edit')
    ->match('/rv/show/[i:id]', 'rv/show', 'rv_show')
    //SERVICES
    ->get('/service', 'service/index', 'service')
    ->match('/service/new', 'service/new', 'service_new')
    //PATIENTS
    ->get('/patient', 'patients/index', 'patient')
    ->match('/patient/new', 'patients/new', 'patient_new')
    ->post('/patient/delete/[i:cin]', 'patients/delete', 'patient_delete')
    ->match('/patient/edit/[i:cin]', 'patients/edit', 'patient_edit')
    ->match('/patient/show/[i:cin]', 'patients/show', 'patient_show')
    ->run();