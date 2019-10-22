<?php

use App\App;
use App\Auth;

$title = "Secretariat";

$auth = (new Auth)->check();

App::getInstance()->getTable('Event')->deleteById($params['id']);
header('location: ' . $router->url('secretary_home') . '?delete=1');