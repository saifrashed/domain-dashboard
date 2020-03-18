<?php

include 'config.php';
require_once './controller/router.php';
date_default_timezone_set('Europe/Berlin');

session_start();

$router = new Router();
$router->determineDestination();
