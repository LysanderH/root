<?php
session_start();
$routes = include 'configs/routes.php';
$routesParts = explode('/', $routes['default']);
$action = $routesParts[1];
$ressource = $routesParts[2];
$method = $_SERVER['REQUEST_METHOD'];
$a = $_REQUEST['a'] ?? $action;
$r = $_REQUEST['r'] ?? $ressource;
if (!in_array($method . '/' . $a . '/' . $r, $routes)) {
    die('Das darfst du nicht XD');
}

$controllerFile = $r . 'Controller.php';
require('controllers/' . $controllerFile);
$data = call_user_func($a);
var_dump($data);
