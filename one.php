<?php
require_once __DIR__ . '/models/newsModel.php';

$id = (isset($_GET['id'])) ? (int)$_GET['id'] : 1;

$article = !is_null( (new newsModel)->getOne($id) ) ? (new newsModel)->getOne($id) : (new newsModel)->getOne(1);

include 'view/one.php';