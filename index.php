<?php
session_start();

try {
    require '/boot.php';

// роутер
    $route = $_GET['r'];
    $routeParts = explode('/', $route);
    $controllerClassName = ucfirst($routeParts[0]) . 'Controller';

// фронтконтроллер
    $controller = new $controllerClassName;
    $controller->action($routeParts[1]);
} catch (Exception $e) {
    echo 'Что-то пошло не так: ' . $e->getMessage();
}