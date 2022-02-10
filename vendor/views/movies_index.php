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
        <?php $i=$firstNumber ?>
        <?php foreach ($movies as $movie): ?>
        <tr onclick="document.location='/movie/watch?movieId=<?= $movie['movieId'] ?>'">
            <td><?=$i?></td>
            <td><?= $movie['name'] ?></td>
            <td><?= $movie['description'] ?></td>
            <td><?= $movie['releaseDate'] ?></td>
            <td><img class="span1" src="<?=$movie['photo']?>"/></td>
            <td>
                <form action="/movie/edit" method="get">
                    <input type="hidden" name="movieId" value="<?= $movie['movieId'] ?>">
                    <input type="submit" value="edit">
                </form>
            </td>
            <td>
                <form action="/movie/delete" method="get">
                    <input type="hidden" name="movieId" value="<?= $movie['movieId'] ?>">
                    <input type="submit" value="delete">
                </form>
            </td>
            <?php $i++ ?>
            <?php endforeach; ?>
        </tr>
    </table>
    <ul class="pagination">
        <li><a href="?page=1">First</a></li>
        <li class="<?php if($page <= 1):?>disabled<?php endif; ?>">
            <a href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?page=".($page + 1); } ?>">Next</a>
        </li>
        <li><a href="?page=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
<?php else: ?>
    <h2>Now site not have movies</h2>
<?php endif; ?>
<form action="/movie/create">
    <input type="submit" value="Add movie">
</form>
