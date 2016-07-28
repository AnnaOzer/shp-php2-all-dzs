<?php
session_start();
require_once '../models/news.php';

$id=(isset($_GET['id'])) ? $_GET['id'] : 0;

$_SESSION['message'] = (News_deleteOne($id)) ? 'Удалено' : 'Что-то пошло не так';

header("Location:../index.php");