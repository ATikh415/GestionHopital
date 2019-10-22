<?php

use App\App;

App::getInstance()->getTable('Specialiste')->deleteById($params['id']);
header('location: '. $router->url('admin_specialiste') . '?delete=1');

?>