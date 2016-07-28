<?php
session_start();

require_once '../models/news.php';

if(!empty($_POST)) {
    if(!empty($_POST['text'])) {
        $article=[];
        $article['title'] = isset($_POST['title']) ? $_POST['title'] : '***';
        $article['text'] = $_POST['text'];
        
        $_SESSION['message'] = (News_addOne($article)) ? 'Добавлено' : 'Что-то пошло не так';
    }
}

header("Location:../index.php");