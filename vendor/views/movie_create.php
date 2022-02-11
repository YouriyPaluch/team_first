<form enctype="multipart/form-data" action="/movie/store" method="post">
    <div>
        <label>Name movie
            <input type="text" name="name" value="<?= ($movie['name'] ?? '') ?>" class="input-xlarge" placeholder="Input movie's name">
            <p class="text-error"><?= $errors['name'] ?? '' ?></p>
        </label>
    </div>
    <div>
        <label>Description
            <textarea name="description" class="input-xxlarge" placeholder="Inpute movie's description"><?= $movie['description'] ?? '' ?></textarea>
            <p class="text-error"><?= $errors['description'] ?? '' ?></p>
        </label>
    </div>
    <div>
        <label>Data release
            <input type="date" name="releaseDate" value="<?= $movie['releaseDate'] ?? '' ?>">
            <p class="text-error"><?= $errors['releaseDate'] ?? '' ?></p>
        </label>
    </div>
    <div>
        <label>Photo
            <input type="file" name="image" id="image"/>
            <p class="text-error"><?= $errors['image'] ?? '' ?></p>
        </label>
    </div>
    <input type="submit" value="Save">
</form>
<div id="new_photo"></div>