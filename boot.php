<?php

require 'vendor/autoload.php';

spl_autoload_register("__MyAutoload");

function __MyAutoload($class)
{
    $namespaces = explode('\\', $class);
    array_shift($namespaces);
    is_readable(__DIR__ . '/' . implode('/', $namespaces) . '.php')
        ? require __DIR__ . '/' . implode('/', $namespaces) . '.php'
        : false;
}

