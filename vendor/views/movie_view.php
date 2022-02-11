<h2 class="text-center"><?= $movie['name'] ?></h2>
<div class="text-center">
   <div class="span5">
        <img src="<?= $movie['image'] ?>"/>
    </div>
    <div class="span6">
            <h4>Release date:</h4>
            <p><?= $movie['releaseDate'] ?></p>
        </div>
        <div class="span6">
            <h4>Description:</h4>
            <text><?= $movie['description'] ?></text>
        </div>
    </div>
</div>