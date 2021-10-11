<form action="/news/update" method="get">
    <input type="hidden" name="id" value="<?= $news['id']?>">
    <label>Title
        <input type="text" name="note" value="<?= $news['title']?>">
    </label>
    <label>Text
        <input type="text" name="note" value="<?= $news['text']?>">
    </label>
    <input type="submit" value="Update">
</form>