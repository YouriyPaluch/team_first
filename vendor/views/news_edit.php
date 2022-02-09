<form action="/news/update" method="post">
    <input type="hidden" name="id" value="<?= $news['id']?>">
    <label>Title
        <input type="text" name="title" value="<?= $news['title']?>">
    </label>
    <label>Text
        <input type="text" name="text" value="<?= $news['text']?>">
    </label>
    <input type="submit" value="Update">
</form>