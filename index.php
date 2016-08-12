<?php
session_start();
require_once __DIR__ . '/models/newsModel.php';

$news  = (new newsModel)->getAll();

if(isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset ($_SESSION['message']);
    echo '<br>';
}

include 'view/index.php';