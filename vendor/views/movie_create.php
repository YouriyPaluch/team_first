<form enctype="multipart/form-data" action="/movie/store" method="post">
    <label>Name movie
        <input type="text" name="name">
    </label>
    <label>Description
        <textarea name="description"></textarea>
    </label>
    <label>Data release
        <input type="date" name="releaseDate">
    </label>
    <label>Photo
        <input type="file" name="photo">
    </label>
    <input type="submit" value="Save">
</form>