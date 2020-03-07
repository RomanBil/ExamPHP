<?php
  if($model->getErrors()){
    foreach($model->getErrors()['username'] as $error){
        echo$error;
    }
    foreach($model->getErrors()['password'] as $error){
      echo$error;
    }
    foreach($model->getErrors()['password2'] as $error){
      echo$error;
    }
    foreach($model->getErrors()['email'] as $error){
      echo$error;
    }
    foreach($model->getErrors()['role'] as $error){
      echo$error;
    }
    foreach($model->getErrors()['status'] as $error){
      echo$error;
    }
  }
?>

<form method="POST">
  <div class="form-group">
    <label for="username">User name</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="form-group">
    <label for="password2">Confirm password</label>
    <input type="password" class="form-control" id="password2" name="password2">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email">
  </div>
  <div class="form-group">
    <label for="role">Role</label>
    <select id="role" name="role">
    <?php
        foreach($roles as $role){    
    ?>
            <option value="<?= $role['id'] ?>"><?= $role["name"] ?></option>
    <?php  
        }
    ?>
    </select>
  </div>
  <div class="form-group">
    <label for="status">Status</label>
    <select id="status" name="status">
    <?php
        foreach($statuses as $status){    
    ?>
            <option value="<?= $status['id'] ?>"><?= $status["name"] ?></option>
    <?php  
        }
    ?>
    </select>
  </div>
  <button type="submit" class="btn btn-success">Add</button>
</form>