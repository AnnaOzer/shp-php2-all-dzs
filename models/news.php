<?php

require_once  __DIR__ . '/../functions/db.php';

function News_getAll()
{
    return DBQuery("
        SELECT * FROM  news
    ");
}

function News_getOne($id)
{
    return (DBQuery("
        SELECT * FROM  news WHERE `id`='" . $id . "'
    "))[0];
}

function News_addOne($article)
{
    return DBExec("
        INSERT INTO news (`title`, `text`) VALUES ('". $article['title']."', '". $article['text']. " .')
    ");
}

function News_updateOne($article, $id)
{
    return DBExec("
        UPDATE news SET `title`='". $article['title']."', `text`='". $article['text']. " .' 
         WHERE `id`='" . $id . "'    
    ");
}

function News_deleteOne($id)
{
    return DBExec("
        DELETE FROM news WHERE `id`='" . $id . "'    
    ");
}