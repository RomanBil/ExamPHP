<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model,'username') ?>

    <?php echo $form->field($model,'password')->passwordInput() ?>

    <?php echo $form->field($model,'password2')->passwordInput() ?>

    <?php echo $form->field($model,'email') ?>

    <?php echo $form->field($model,'idrole')->dropDownList($model->getListRoles()); ?>

    <?php echo $form->field($model,'statusid')->dropDownList($model->getListStatus()); ?>

    <?php echo Html::submitButton('add',['class'=>'btn btn-success']) ?>

<?php ActiveForm::end(); ?>