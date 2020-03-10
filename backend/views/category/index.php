<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model,'name') ?>

    <?php echo Html::submitButton('add',['class'=>'btn btn-success']) ?>

<?php ActiveForm::end(); ?>

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

    $this->registerJs('$(".delete").on("click", function(){
        var key = this.name;
     $.ajax({
         url: "http://backend:81/category/delete?id="+key,
         success: function(){
            window.location.href = "../category";
         }
     })
 });')
?>