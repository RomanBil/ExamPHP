<div>
    <form action="../catalog/sound">
        <input type="text" placeholder="Search.." name="search">
        <button class="btn btn-success" type="submit">Search</button>
    </form>
</div>
<br>

<?php
    use yii\helpers\Html;
    use yii\bootstrap\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>
    <?php echo $form->field($model,'categoryId')->dropDownList($model->getListCategory()); ?>
    <?php echo Html::submitButton('Show',['class'=>'btn btn-success','name'=>'showOne','value'=>'showOne']) ?>
    <?php echo Html::submitButton('Show All',['class'=>'btn btn-success','name'=>'showAll','value'=>'showAll']) ?>
<?php ActiveForm::end(); ?>

<?php
    foreach($sounds as $sound){
?>
    <div>
        <p for="sound"><b>Name sound:</b> <?= $sound["name"] ?></p>
        <audio class="sound" src='<?= $sound["path"] ?>' controls></audio><br>
        <a download href="<?= $sound["path"] ?>" class="btn btn-success">Download</a>
        <a href="/catalog/complaint?soundid=<?= $sound["id"] ?>" class="btn btn-danger">Complaint</a>
    </div>
    <hr>
<?php
    }
?>