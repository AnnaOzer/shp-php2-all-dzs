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
            <a href="one.php?id=<?=$article['id'];?>">Просмотреть эту новость</a>
            <a href="/controllers/updater.php?id=<?=$article['id'];?>">Редактировать эту новость</a>
            <a href="/controllers/delete.php?id=<?=$article['id'];?>">Удалить эту новость</a>
        </div>
    </article>
    <?php endforeach; ?>
<a href="../controllers/adder.php">Добавить статью</a>
</body>
</html>