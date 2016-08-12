<?php
require_once '../models/newsModel.php';

$id=(isset($_GET['id'])) ? $_GET['id'] : 1;
$article = ( new newsModel() )->getOne($id);

include '../view/form_update.php';