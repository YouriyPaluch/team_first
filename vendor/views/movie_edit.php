<form action="/news/update" method="post">
    <input type="hidden" name="id" value="<?= $movie['id']?>">
    <label>Title
        <input type="text" name="title" value="<?= $movie['title']?>">
    </label>
    <label>Text
        <textarea name="text"><?= $movie['text']?></textarea>
    </label>
    <input type="submit" value="Update">
</form>