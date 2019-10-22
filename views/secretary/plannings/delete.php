<?php

use App\App;
use App\Auth;

$title = "Secretariat";

$auth = (new Auth)->check();

$patientTable = App::getInstance()->getTable('Patient')->delete($params['cin']);
header('location: '. $router->url('secretary_patient') . '?delete=1');

?>