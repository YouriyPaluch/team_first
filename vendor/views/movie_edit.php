<form action="/movie/update" method="post" enctype="multipart/form-data" class="column">
    <input type="hidden" name="movieId" value="<?= $movie['movieId'] ?>">
    <div>
        <label>Name
            <input type="text" name="name" value="<?= $movie['name'] ?>">
            <p class="text-error"><?= $errors['name'] ?? '' ?></p>
        </label>
    </div>
    <div>
        <label>Description
            <textarea name="description"><?= $movie['description'] ?></textarea>
            <p class="text-error"><?= $errors['description'] ?? '' ?></p>
        </label>
    </div>
    <div>
        <label>Data release
            <input type="date" name="releaseDate" value="<?= $movie['releaseDate'] ?>">
            <p class="text-error"><?= $errors['releaseDate'] ?? '' ?></p>
        </label>
    </div>
    <div class="span4">Saved photo
        <img src="<?= $movie['image'] ?>"/>
        <input type="hidden" name="imageIfError" value="<?= $movie['image'] ?>">
    </div>
    <div>
        <label>Photo
            <input type="file" name="image" id="image">
            <p class="text-error"><?= $errors['image'] ?? '' ?></p>
        </label>
    </div>
    <input type="submit" value="Update">
</form>
<div id="new_photo"></div>