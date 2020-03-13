<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sound2 */

$this->title = 'Create Sound';
$this->params['breadcrumbs'][] = ['label' => 'Sound', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sound2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
