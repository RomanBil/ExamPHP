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
        <audio class="sound" src='<?= $sound["path"] ?>' controls></audio><br>
        <a download href="<?= $sound["path"] ?>" class="btn btn-success">Download</a>
        <a href="/catalog/complaint?soundid=<?= $sound["id"] ?>" class="btn btn-danger">Complaint</a>
    </div>
    <hr>
<?php
    }
?>