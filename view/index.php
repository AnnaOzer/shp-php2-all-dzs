<?php
/*
  * @var array $news Список всех новостей
  */
?>

<html>
<head>
    <title>Новости</title>
</head>
<body>
    <?php

    foreach ($news as $article): ?>
    <article>
        <h1><?=$article->title; ?></h1>
        <div><?=$article->text; ?></div>
        <div>
            <a href="/news/one&id=<?=$article->id; ?>">Просмотреть эту новость</a>
            <a href="/news/updater&id=<?=$article->id; ?>">Редактировать эту новость</a>
            <a href="/news/delete&id=<?=$article->id; ?>">Удалить эту новость</a>
        </div>
    </article>
    <?php endforeach; ?>
<a href="/news/adder">Добавить статью</a>
</body>
</html>