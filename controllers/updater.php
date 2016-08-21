<?php
require_once '../models/newsModel.php';
require_once __DIR__ . '/../classes/View.php';

$id=(isset($_GET['id'])) ? $_GET['id'] : 1;

$view = new View();
$view->article = ( new newsModel() )->getOne($id);

$view->display('form_update');