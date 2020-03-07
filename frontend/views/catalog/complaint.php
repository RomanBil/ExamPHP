<?php
  if($model->getErrors()){
    foreach($model->getErrors()['description'] as $error){
        echo$error;
    }
    foreach($model->getErrors()['soundid'] as $error){
      echo$error;
    }
  }
?>

<form method="POST">
    <input type="hidden" value="$id">
    <div class="form-group">
        <label for="description">Reason</label>
        <input type="text" class="form-control" id="description" name="description">
    </div>

    <button class="btn btn-success" type="submit">Add</button>
</form>