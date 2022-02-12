<a class="btn btn-success span11" href="/movie/create">Add movie</a>
<?php if (count($movies) > 0): ?>
    <h2 class="span12 text-center">All movies</h2>
    <div>
        <table class="span12 text-center">
            <?php foreach ($movies

            as $movie): ?>
            <tr>
                <td colspan="2" onclick="document.location='/movie/show?movieId=<?= $movie['movieId'] ?>'">
                    <img class="span4" src="<?= $movie['image'] ?>"/>
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
                        <a class="btn btn-primary span2"
                           href="/movie/delete?movieId=<?= $movie['movieId'] ?>">Delete</a>
                    </div>
                </td>
                <?php endforeach; ?>
        </table>
        <p><?= ($page) ?></p>
    </div>
    <div class="pagination pagination-centered">
        <?php if ($total_pages > 1): ?>
            <ul >
                <?php if ($page > 1): ?>
                    <li>
                        <a href="/">First</a>
                    </li>
                    <li>
                        <a href="?page=<?= ($page - 1) ?>">Prev</a>
                    </li>
                <?php endif; ?>
                <?php if ($page != $total_pages): ?>
                    <li>
                        <a href="?page=<?= ($page + 1) ?>">Next</a>
                    </li>
                    <li>
                        <a href="?page=<?= $total_pages ?>">Last</a>
                    </li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>
    </div>
    <div class="pagination pagination-centered">
        <?php if ($total_pages > 1): ?>
            <ul>
                <?php if ($page > 1): ?>
                    <li>
                        <a href="/">First</a>
                    </li>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li <?php if($page == $i):?> class="active" <?php endif; ?>>
                        <a href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
                <?php if ($page != $total_pages): ?>
                    <li>
                        <a href="?page=<?= $total_pages ?>">Last</a>
                    </li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>
    </div>
<?php else: ?>
    <h2 class="text-center">Now site not have movies</h2>
<?php endif; ?>
