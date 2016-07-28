<?php
require_once __DIR__ . '/models/news.php';

$id = (isset($_GET['id'])) ? (int)$_GET['id'] : 1;

$article = News_getOne($id);

include 'view/one.php';