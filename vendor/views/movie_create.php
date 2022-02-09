<link rel="stylesheet" href="/vendor/css/bootstrap.css">
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
        <input type="file" name="image">
    </label>
    <input type="submit" value="Save">
</form>