<?php
    if($model->getErrors()){
        print_r($model->getErrors());
    }
?>

<?php
    foreach($sounds as $sound){
?>
    <form method="POST">
    <div class="form-group">
        <input type="hidden" name="id" value ="<?= $sound["id"] ?>">
        <p>Name sound: <?= $sound["name"] ?></p>
        <label for="category">Category name</label>
        <select id="category" name="categoryid">
    <?php
        foreach($categories as $category){
            if($category['id']==$sound["categoryId"]){
?>
                <option selected value="<?= $category['id'] ?>"><?= $category["name"] ?></option>
<?php
            }
            else{
    ?>
        <option value="<?= $category['id'] ?>"><?= $category["name"] ?></option>
    <?php
            }
        }
    ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
    </form>
    <hr>
<?php
    }
?>