<?php
    foreach($complaints as $complaint){
?>
    
    <div class="form-group">
        <?php
            foreach($sounds as $sound){
                if($complaint['soundid']==$sound['id']){   
        ?>
            <p><b>Sound name:</b> <?= $sound["name"] ?></p>
        <?php
                }
            }
        ?>
        <p><b>Description complaint:</b> <?= $complaint["description"] ?></p>
    </div>
    <hr>
<?php
    }
?>