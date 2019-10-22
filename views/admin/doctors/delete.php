<?php

use App\App;
use App\Auth;

$title = "Administration";

$auth = (new Auth)->check();

App::getInstance()->getTable('Secretariat')->deleteById($params['id']);
header('location: '. $router->url('admin_secretary') . '?delete=1');

?>