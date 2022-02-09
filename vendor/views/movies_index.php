<h2>All News</h2>
<table>
    <tr>
        <th>№</th>
        <th>Title</th>
        <th>Article</th>
        <th>Date create</th>
        <th>Date update</th>
        <th>Author</th>
    </tr>
    <?php if(count($movies)>0):?>
    <?php foreach ($movies as $movie):?>
    <tr>
        <td><?=$movie['id']?></td>
        <td><?=$movie['title']?></td>
        <td><?=$movie['text']?></td>
        <td><?=$movie['createdate']?></td>
        <td><?=$movie['updatedate']?></td>
        <td><?=$movie['author']?></td>
        <td><form action="/news/edit" method="get">
                <input type="hidden" name="id" value="<?= $movie['id']?>">
                <input type="submit" value="edit" >
            </form>
        </td>
        <td><form action="/news/delete" method="get">
                <input type="hidden" name="id" value="<?= $movie['id']?>">
                <input type="submit" value="delete" >
            </form>
        </td>
        <?php endforeach;?>
        <?php endif;?>
    </tr>
</table>
<form action="/news/create">
    <input type="submit" value="new note">
</form>
