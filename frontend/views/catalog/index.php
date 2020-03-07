<div>
    <form action="../catalog/sound">
        <input type="text" placeholder="Search.." name="search">
        <button class="btn btn-success" type="submit">Search</button>
    </form>
</div>
<br>
<?php
    foreach($sounds as $sound){
?>
    <div>
        <p for="sound"><b>Name sound:</b> <?= $sound["name"] ?></p>
        <audio class="sound" src="../web/files/sound/<?= $sound["path"] ?>" controls></audio><br>
        <a href="#" class="btn btn-success">Download</a>
        <a href="/catalog/complaint?id=<?= $sound["id"] ?>" class="btn btn-danger">Complaint</a>
    </div>
    <hr>
<?php
    }
?>