<?php
  if($model->getErrors()){
    foreach($model->getErrors()['name'] as $error){
        echo$error;
    }
    foreach($model->getErrors()['category'] as $error){
      echo$error;
    }
    foreach($model->getErrors()['path'] as $error){
      echo$error;
    }
  }
?>

<form method="GET" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">Sound name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="category">Catregory</label>
    <select id="category" name="category">
    <?php
        foreach($categories as $category){    
    ?>
            <option value="<?= $category['id'] ?>"><?= $category["name"] ?></option>
    <?php  
        }
    ?>
    </select>
  </div>
  <div class="form-group">
    <label for="sound">Sound</label>
    <input type="file" id="sound" name="sound" accept="audio/*">
  </div>
  <input type="submit" class="btn btn-success" value="Add">
</form>