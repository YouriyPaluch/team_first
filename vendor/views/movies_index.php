<?php if (count($movies) > 0): ?>
    <h2 class="span12 text-center">All movies</h2>
<div>
    <table class="span12 text-center">
        <?php foreach ($movies as $movie): ?>
        <tr onclick="document.location='/movie/watch?movieId=<?= $movie['movieId'] ?>'">
            <td><?= $movie['name'] ?></td>
            <td><img class="span2" src="<?= $movie['photo'] ?>"/></td>
            <td>Release date <?= $movie['releaseDate'] ?></td>
            <td>
                <a class="btn" href="/movie/show?movieId=<?= $movie['movieId'] ?>">More</a>
                <a class="btn" href="/movie/edit?movieId=<?= $movie['movieId'] ?>">Edit</a>
                <a class="btn" href="/movie/delete?movieId=<?= $movie['movieId'] ?>">Delete</a>
<!--                <form action="/movie/edit" method="get">-->
<!--                    <input type="hidden" name="movieId" value="--><?//= $movie['movieId'] ?><!--">-->
<!--                    <input type="submit" value="edit">-->
<!--                </form>-->
            </td>
<!--            <td>-->
<!--                <form action="/movie/delete" method="get">-->
<!--                    <input type="hidden" name="movieId" value="--><?//= $movie['movieId'] ?><!--">-->
<!--                    <input type="submit" value="delete">-->
<!--                </form>-->
<!--            </td>-->
        </tr>
            <?php endforeach; ?>
    </table>
</div>
<!--<div>Hello</div>-->
<div>
    <?php if ($page > 1): ?>
    <ul class="nav text-center">
        <li class="btn"><a href="?page=1">First</a></li>
        <li class="btn">
            <a href="<?php if ($page <= 1) {
                echo '#';
            } else {
                echo "?page=" . ($page - 1);
            } ?>">Prev</a>
        </li>
        <li class="btn <?php if ($page >= $total_pages) {
            echo 'disabled';
        } ?>">
            <a href="<?php if ($page >= $total_pages) {
                echo '#';
            } else {
                echo "?page=" . ($page + 1);
            } ?>">Next</a>
        </li>
        <li class="btn"><a href="?page=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
    <?php endif; ?>
</div>
<?php else: ?>
    <h2>Now site not have movies</h2>
<?php endif; ?>
<form action="/movie/create">
    <input type="submit" value="Add movie">
</form>
