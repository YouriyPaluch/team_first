<link rel="stylesheet" href="/vendor/css/bootstrap.css">
<?php if (count($movies) > 0): ?>
    <h2>All movies</h2>
    <table>
        <tr>
            <th>№</th>
            <th>Name</th>
            <th>Description</th>
            <th>Data release</th>
            <th>Photo</th>
        </tr>
        <?php $i=1 ?>
        <?php foreach ($movies as $movie): ?>
        <tr>
            <td><?=$i?></td>
            <td><?= $movie['name'] ?></td>
            <td><?= $movie['description'] ?></td>
            <td><?= $movie['releaseDate'] ?></td>
            <td><img src="<?=$movie['photo']?>"/></td>
            <td>
                <form action="/movie/edit" method="get">
                    <input type="hidden" name="id" value="<?= $movie['id'] ?>">
                    <input type="submit" value="edit">
                </form>
            </td>
            <td>
                <form action="/movie/delete" method="get">
                    <input type="hidden" name="id" value="<?= $movie['id'] ?>">
                    <input type="submit" value="delete">
                </form>
            </td>
            <?php $i++ ?>
            <?php endforeach; ?>
        </tr>
    </table>
<?php else: ?>
    <h2>Now site not have movies</h2>
<?php endif; ?>
<form action="/movie/create">
    <input type="submit" value="new note">
</form>
