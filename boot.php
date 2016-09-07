<?php

function __autoload($class)
{
    // require '/classes/' . $class . '.php';
    
    $folders = ['classes', 'models', 'functions'];

    foreach($folders as $folder) {
        
        $filePath = __DIR__. '/' . $folder . '/' . $class . '.php';
        
        if(is_file($filePath)) {

            require $filePath;
            break;
        }
    }

    
}

//require_once '/models/newsModel.php';