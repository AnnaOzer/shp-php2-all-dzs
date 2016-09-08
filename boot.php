<?php

function __autoload($class)
{
    // require '/classes/' . $class . '.php';
    
    $folders = ['classes', 'models',  'controllers', 'exceptions'];

    foreach($folders as $folder) {
        
        $filePath = __DIR__. '/' . $folder . '/' . $class . '.php';
        
        if(is_file($filePath)) {

            require $filePath;
            break;
        }
    }

    
}

