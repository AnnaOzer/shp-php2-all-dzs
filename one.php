<?php
require_once __DIR__ . '/models/newsModel.php';
require_once __DIR__ . '/classes/View.php';

$id = (isset($_GET['id'])) ? (int)$_GET['id'] : 1;

$view = new View();

$view->article = !is_null( (new newsModel)->getOne($id) ) ? (new newsModel)->getOne($id) : (new newsModel)->getOne(1);

$view->display('one');