<table>
    <form enctype="multipart/form-data" action="/movie/store" method="post">
        <tr>
            <td>
                <label for="name"> Name movie</label>
            </td>
            <td>
                <input type="text" id="name" name="name" value="<?= ($movie['name'] ?? '') ?>"
                       placeholder="Input movie's name">
                <p class="text-error"><?= $errors['name'] ?? '' ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <label for="description">Description</label>
            </td>
            <td>
                <textarea name="description" id="description" class="input-xxlarge"
                          placeholder="Inpute movie's description"><?= $movie['description'] ?? '' ?></textarea>
                <p class="text-error"><?= $errors['description'] ?? '' ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <label for="releaseDate">Data release</label>
            </td>
            <td>
                <input type="date" id="releaseDate" name="releaseDate" value="<?= $movie['releaseDate'] ?? '' ?>">
                <p class="text-error"><?= $errors['releaseDate'] ?? '' ?></p>
            </td>
        </tr>
        <tr>
            <td>
                <label>Photo</label>
            </td>
            <td>
                <input type="file" name="image" id="image"/>
                <div id="new_photo"></div>
                <p class="text-error"><?= $errors['image'] ?? '' ?></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="text-center">
                <input class="span2" type="submit" value="Save">
            </td>
        </tr>
    </form>
</table>