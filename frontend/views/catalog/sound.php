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
    </div>
<?php
    }
?>