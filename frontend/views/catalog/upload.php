<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?php echo $form->field($model,'name') ?>

    <?php echo $form->field($model,'categoryId')->dropDownList($model->getListCategory()); ?>

    <?php echo $form->field($model,'path')->fileInput(['class' => 'btn btn-primary']) ?>

    <!-- <?php echo $form->field($model,'path')->fileInput(['class' => 'custom-file-input']) ?> -->

    <?php echo Html::submitButton('add',['class'=>'btn btn-success']) ?>

<?php ActiveForm::end(); ?>