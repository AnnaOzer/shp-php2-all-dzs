<?php
session_start();

require_once __DIR__ . '/models/newsModel.php';
require_once __DIR__ . '/classes/View.php';

$view = new View();
$view->news = (new newsModel)->getAll();

if(isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset ($_SESSION['message']);
    echo '<br>';
}

$view->display('index');
