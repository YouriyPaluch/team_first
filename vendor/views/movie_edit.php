<form action="/movie/update" method="post" enctype="multipart/form-data" class="form-actions">
    <input type="hidden" name="movieId" value="<?= $movie['movieId'] ?>">
    <label>Name
        <input type="text" name="name" value="<?= $movie['name'] ?>">
    </label>
    <label>Description
        <textarea name="description"><?= $movie['description'] ?></textarea>
    </label>
    <label>Data release
        <input type="date" name="releaseDate" value="<?= $movie['releaseDate'] ?>">
    </label>
    <div>Saved photo
        <img class="img-polaroid span2" src="<?= $movie['photo'] ?>"/>
    </div>
    <label>Photo
        <input type="file" name="photo">
    </label>
    <input type="submit" value="Update">
</form>