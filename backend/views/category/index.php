<?php
    if($model->getErrors()){
        print_r($model->getErrors());
    }
?>

<form method="POST">
  <div class="form-group">
    <label for="name">Category name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
</form>

<?php
    if($categories){
        echo"<h1>Categories sound:</h1>";
    }

    foreach($categories as $category){
?>
    <div class="del">
        <span><?= $category["name"] ?></span>
        <button name="<?= $category["id"] ?>" class="delete btn btn-danger">Delete</button><br><br>
    </div>
<?php
    }

    // $this->registerJs(
    //     "$('.delete').on('click', function() { alert(this.name); });"
    // );

    $this->registerJs('$(".delete").on("click", function(){
        var key = this.name;
     $.ajax({
         url: "http://backend/category/delete?id="+key,
         success: function(){
            window.location.href = "../category";
         }
     })
 });')
?>