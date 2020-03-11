<?php
    if($sound=="s"){
?>
        <p><b>Sound not found!</b></p>
<?php
    }
    else{
?>
    <div>
        <p><b>Name sound:</b> <?= $sound["name"] ?></p>
        <audio class="sound" src="../web/files/sound/<?= $sound["path"] ?>" controls></audio><br>
        <a href="#" class="btn btn-success">Download</a>
        <a href="/catalog/complaint?soundid=<?= $sound["id"] ?>" class="btn btn-danger">Complaint</a>
    </div>
<?php
    }
?>