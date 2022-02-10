<div class="row text-center">
    <div class="sidebar span6">
        <img src="<?= $movie['image'] ?>"/>
    </div>
    <div class="content span6">
        <h2><?= $movie['name'] ?></h2>
        <div class="arrow">
            <h4>Release date:</h4>
            <p><?= $movie['releaseDate'] ?></p>
        </div>
        <div>
            <h4>Description:</h4>
            <text><?= $movie['description'] ?></text>
        </div>
    </div>
</div>