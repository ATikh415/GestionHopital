<?php

session_start();

session_destroy();
header('location: ' . $router->url('login') . '?logout=1');
exit();