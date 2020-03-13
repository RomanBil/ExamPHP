<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Sound2 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sound2-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model,'path')->fileInput(['class' => 'btn btn-primary',
    'value' => '/uploads/Fire2.mp3']) ?>

    <?php echo $form->field($model,'categoryId')->dropDownList($model->getListCategory()); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
