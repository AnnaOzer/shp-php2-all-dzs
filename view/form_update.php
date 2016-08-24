<?php
/*
 *  @var array $article Одна новость
 */
?>

<form method="post" action="/?r=news/update">
    <input type="hidden" name="id" value="<?=$article['id']; ?>">
    Название: <input type="text" name="title" value="<?=$article['title']; ?>"><br>
    Текст: <textarea name="text"><?=$article['text']; ?></textarea><br>
    <input type="submit" value="Отправить">
</form>




