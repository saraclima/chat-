<?php
require 'vendor/autoload.php';
use Chat\Router\Router;

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//die();
$router = new Router($_GET['url']);
require 'app/routes.php';

$router->run();
