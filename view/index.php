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
    <?php foreach ($news as $article): ?>
    <article>
        <h1><?=$article['title']; ?></h1>
        <div><?=$article['text']; ?></div>
        <div>
            <a href="/?r=news/one&id=<?=$article['id'];?>">Просмотреть эту новость</a>
            <a href="/?r=news/updater&id=<?=$article['id'];?>">Редактировать эту новость</a>
            <a href="/?r=news/delete&id=<?=$article['id'];?>">Удалить эту новость</a>
        </div>
    </article>
    <?php endforeach; ?>
<a href="/?r=news/adder">Добавить статью</a>
</body>
</html>