<form action="/movie/update" method="post">
    <input type="hidden" name="id" value="<?= $movie['id']?>">
    <label>Title
        <input type="text" name="title" value="<?= $movie['name']?>">
    </label>
    <label>Text
        <textarea name="text"><?= $movie['description']?></textarea>
    </label>
    <input type="submit" value="Update">
</form>