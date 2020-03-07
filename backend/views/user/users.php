<?php
    foreach($users as $user){    
?>
        <p><b>Username: </b> <?= $user['username'] ?></p>

        <label for="status"><b>Status: </b></label>
        <select class="status" name="status">
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
        </select><br>

        <button name="<?= $user['id'] ?>" class="btn btn-success">Save</button>

        <hr>
<?php  
    }

    $this->registerJs('$(".btn").on("click", function(){
        var key = this.previousSibling.previousSibling.previousSibling.value;
        var key2 = this.name;
     $.ajax({
         url: "http://backend/user/update?idstat="+key+"&id="+key2,
         success: function(){
            alert("update");
         }
     })
 });')
?>