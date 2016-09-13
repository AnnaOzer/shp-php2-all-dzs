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
        <?php
        //echo json_encode($article);
        //$article = json_decode('{"id":100, "title":"Some Title", "text":"Make me good"}');
        ?>
        <h1><?=$article->title; ?></h1>
        <div><?=$article->text; ?></div>
        <a href="/news/updater&id=<?=$article->id; ?>">Редактировать</a>
    </article>
    
</body>
</html>