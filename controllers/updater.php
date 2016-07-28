<?php
require_once '../models/news.php';

$id=(isset($_GET['id'])) ? $_GET['id'] : 1;
$article = News_getOne($id);

include '../view/form_update.php';