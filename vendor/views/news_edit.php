<form action="/news/update" method="post">
    <input type="hidden" name="id" value="<?= $news['id']?>">
    <label>Title
        <input type="text" name="title" value="<?= $news['title']?>">
    </label>
    <label>Text
        <textarea name="text"><?= $news['text']?></textarea>
    </label>
    <input type="submit" value="Update">
</form>