<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <form method="POST">
                <div class="form-group">
                    <label for="username">User name</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="g-recaptcha" data-sitekey="6LduSOAUAAAAANpVz1eS5M-dcmfkIHzqgU3Ufg4F"></div>
                <!-- key v2 6LduSOAUAAAAANpVz1eS5M-dcmfkIHzqgU3Ufg4F -->
                <!-- key v3 6Lcwo98UAAAAAPBXWptXiD5S5kwwqro3OuXcim9j -->

                <input type="submit" class="btn btn-success" value="Signup">
            </form>
        </div>
    </div>
</div>

<script src="https://www.google.com/recaptcha/api.js"></script>