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
        <audio class="sound" src='<?= $sound["path"] ?>' controls></audio><br>
        <a download href="<?= $sound["path"] ?>" class="btn btn-success">Download</a>
        <a href="/catalog/complaint?soundid=<?= $sound["id"] ?>" class="btn btn-danger">Complaint</a>
    </div>
<?php
    }
?>