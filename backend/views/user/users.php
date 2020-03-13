<?php
    foreach($users as $user){    
?>
    <form method="POST">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />

        <label for="username"><b>Username: </b></label>
        <input readonly style="border:none;outline: none;" type="text" name='username' class="username" value="<?= $user['username'] ?>"><br>

        <label for="status"><b>Status: </b></label>
        <select class="statusid btn btn-primary" name="statusid">
            <?php
                foreach($statuses as $status){   
                    if($status['id'] == $user['statusid']){ 
            ?>
                    <option selected value="<?= $status['id'] ?>"><?= $status["name"] ?></option>
            <?php  
                    }
                    else{
            ?>
                    <option value="<?= $status['id'] ?>"><?= $status["name"] ?></option>
            <?php
                    }
                }
            ?>
        </select><br><br>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
        <hr>
<?php  
    }
?>