<?php
session_start();

require '/boot.php';

// роутер
$route = $_GET['r'];
$routeParts = explode('/', $route);
$controllerClassName = ucfirst($routeParts[0]) . 'Controller';

// фронтконтроллер
$controller = new $controllerClassName;
$controller->action($routeParts[1]);
