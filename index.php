<?php

session_start();

try {
    require '/boot.php';

// роутер
    $route = $_GET['__route'];
    $routeParts = explode('/', $route);
    $controllerClassName = !empty($routeParts[0])
        ? 'App\Controllers\\'. ucfirst($routeParts[0]) . 'Controller'
        : 'App\Controllers\NewsController';

// фронтконтроллер

    $controller = new $controllerClassName;
    !empty($routeParts[1]) ? $controller->action($routeParts[1]) : $controller->action('all');
    
} catch (Exception $e) {
    echo 'Что-то пошло не так: ' . $e->getMessage();
}

