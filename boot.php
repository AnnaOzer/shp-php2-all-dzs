<?php

function __autoload($class)
{
    require '/classes/' . $class . '.php';
}

require_once '/models/newsModel.php';