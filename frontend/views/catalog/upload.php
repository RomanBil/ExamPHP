<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?php echo $form->field($model,'name') ?>

    <?php echo $form->field($model,'categoryId')->dropDownList([
      $model->getListCategory()
    ]); ?>

    <?php echo $form->field($model,'path')->fileInput() ?>

    <?php echo Html::submitButton('add',['class'=>'btn btn-success']) ?>

<?php ActiveForm::end(); ?>

<!-- <form method="GET" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">Sound name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  
  <div class="form-group">
    <label for="sound">Sound</label>
    <input type="file" id="sound" name="sound" accept="audio/*">
  </div>
  <input type="submit" class="btn btn-success" value="Add">
</form> -->