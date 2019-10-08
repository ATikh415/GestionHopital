<?php

use App\App;

$patientTable = App::getInstance()->getTable('Patient')->delete($params['cin']);
header('location: '. $router->url('patient') . '?delete=1');

?>