<form method="post" action="../controllers/update.php">
    <input type="hidden" name="id" value="<?=$id; ?>">
    Название: <input type="text" name="title" value="<?=$article['title']; ?>"><br>
    Текст: <textarea name="text"><?=$article['text']; ?></textarea><br>
    <input type="submit" value="Отправить">
</form>