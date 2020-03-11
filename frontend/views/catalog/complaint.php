<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'soundid')->label(false)->hiddenInput(['value' => $soundid]); ?>

    <?php echo $form->field($model,'description') ?>

    <?php echo Html::submitButton('add',['class'=>'btn btn-success']) ?>

<?php ActiveForm::end(); ?>

<!-- <form method="POST">
    <input type="hidden" value="$id">
    <div class="form-group">
        <label for="description">Reason</label>
        <input type="text" class="form-control" id="description" name="description">
    </div>

    <button class="btn btn-success" type="submit">Add</button>
</form> -->