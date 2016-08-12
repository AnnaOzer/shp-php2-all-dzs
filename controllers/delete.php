<?php
session_start();
require_once '../models/newsModel.php';

$id=(isset($_GET['id'])) ? $_GET['id'] : 0;

if( !is_null( (new newsModel)->getOne($id) )  ) {
    $_SESSION['message'] = (new newsModel)->delete($id) ? 'Удалено' : 'Что-то пошло не так';
} else {
    $_SESSION['message'] = 'Попытка удалить несуществующую новость';
}

header("Location:../index.php");