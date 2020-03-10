<?php
  // if($model->getErrors()){
  //   foreach($model->getErrors()['username'] as $error){
  //       echo$error;
  //   }
  //   foreach($model->getErrors()['password'] as $error){
  //     echo$error;
  //   }
  //   foreach($model->getErrors()['password2'] as $error){
  //     echo$error;
  //   }
  //   foreach($model->getErrors()['email'] as $error){
  //     echo$error;
  //   }
  //   foreach($model->getErrors()['role'] as $error){
  //     echo$error;
  //   }
  //   foreach($model->getErrors()['status'] as $error){
  //     echo$error;
  //   }
  // }
?>

<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model,'username') ?>

    <?php echo $form->field($model,'password_hash') ?>

    <?php echo $form->field($model,'email') ?>

    <?php echo $form->field($model,'idrole')->dropDownList([
      $model->getListRoles()
    ]); ?>

    <?php echo $form->field($model,'statusid')->dropDownList([
      $model->getListStatus()
    ]); ?>

    <?php echo Html::submitButton('add',['class'=>'btn btn-success']) ?>

<?php ActiveForm::end(); ?>