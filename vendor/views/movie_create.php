<form enctype="multipart/form-data" action="/movie/store" method="post">
    <label>Name movie
        <input type="text" name="name" required>
        <p class="error"><?php if(isset($errors['name'])){ echo $errors['name']; }?></p>
    </label>
    <label>Description
        <textarea name="description" required></textarea>
        <p class="error"><?php if(isset($errors['name'])){ echo $errors['description']; }?></p>
    </label>
    <label>Data release
        <input type="date" name="releaseDate" required>
        <p class="error"><?php if(isset($errors['name'])){ echo $errors['releaseDate']; }?></p>
    </label>
    <label>Photo
        <input type="file" name="photo" required>
        <p class="error"><?php if(isset($errors['name'])){ echo $errors['photo']; }?></p>
    </label>
    <input type="submit" value="Save">
</form>