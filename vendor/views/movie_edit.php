<table>
    <form action="/movie/update" method="post" enctype="multipart/form-data">
        <input type="hidden" name="movieId" value="<?= $movie['movieId'] ?>">
        <tr>
            <td>
                <label for="name">Name</label>
            </td>
            <td>
                <input type="text" id="name" name="name" value="<?= $movie['name'] ?>">
                <p class="text-error"><?= $errors['name'] ?? '' ?></p>
            </td>
        </tr>
        <tr>

            <td>
                <label for="description">Description</label>
            </td>
            <td>
                <textarea id="description" name="description"><?= $movie['description'] ?></textarea>
                <p class="text-error"><?= $errors['description'] ?? '' ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <label for="releaseDate">Data release</label>
            </td>
            <td>
                <input type="date" id="releaseDate" name="releaseDate" value="<?= $movie['releaseDate'] ?>">
                <p class="text-error"><?= $errors['releaseDate'] ?? '' ?></p>
            </td>
        </tr>
        <tr>
            <td>Saved photo</td>
            <td>
                <img class="span2" src="<?= $movie['image'] ?>"/>
                <input type="hidden" name="imageIfError" value="<?= $movie['image'] ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label>New photo</label>
            </td>
            <td>
                <input type="file" name="image" id="image">
                <div class="column" id="new_photo"></div>
                <p class="text-error"><?= $errors['image'] ?? '' ?></p>
            </td>
        </tr>
        <tr>
            <td rowspan="2">
                <input type="submit" value="Update">
            </td>
        </tr>
    </form>

</table>