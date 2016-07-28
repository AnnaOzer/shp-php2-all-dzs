<?php
session_start();

require_once '../models/news.php';

if(!empty($_POST)) {

    if(!empty($_POST['id'])) {
        if (!empty($_POST['text'])) {
            $article = [];
            $article['title'] = isset($_POST['title']) ? $_POST['title'] : '***';
            $article['text'] = $_POST['text'];
            
            $id = (int)$_POST['id'];

            $_SESSION['message'] = (News_updateOne($article, $id)) ? 'Обновлено' : 'Что-то пошло не так';
        }

    }
}
    
    

header("Location:../index.php");