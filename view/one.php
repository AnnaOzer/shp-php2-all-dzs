<?php
/*
  * @var array $article Одна новость
  */
?>

<html>
<head>
    <title>Новости</title>
</head>
<body>

    <article>
        <h1><?=$article->title; ?></h1>
        <div><?=$article->text; ?></div>
        <a href="/?r=news/updater&id=<?=$article->id; ?>">Редактировать</a>
    </article>
    
</body>
</html>