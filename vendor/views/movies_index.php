<a class="btn btn-success span11" href="/movie/create">Add movie</a>
<?php if (count($movies) > 0): ?>
    <h2 class="span12 text-center">All movies</h2>
    <div>
        <table class="span12 text-center">
            <?php foreach ($movies

            as $movie): ?>
            <tr>
                <td colspan="2" onclick="document.location='/movie/show?movieId=<?= $movie['movieId'] ?>'">
                    <img class="span4" src="<?= $movie['image'] ?>" />
                </td>
                <td>
                    <h4><?= $movie['name'] ?></h4>
                    <h6>Release date: <?= $movie['releaseDate'] ?></h6>
                </td>
                <td>
                    <div class="column">
                        <a class="btn btn-primary span2" href="/movie/show?movieId=<?= $movie['movieId'] ?>">More</a>
                    </div>
                    <div class="column">
                        <a class="btn btn-primary span2" href="/movie/edit?movieId=<?= $movie['movieId'] ?>">Edit</a>
                    </div>
                    <div class="column">
                        <a class="btn btn-primary span2" href="/movie/delete?movieId=<?= $movie['movieId'] ?>">Delete</a>
                    </div>
                </td>
                <?php endforeach; ?>
        </table>
    </div>
    <div>
        <?php if ($total_pages > 1): ?>
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
