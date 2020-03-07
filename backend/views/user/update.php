<?php
    use backend\models\User;

    if(Yii::$app->request->isGet){
        $fromData = Yii::$app->request->get();

        $model = new User();

        $model ->updateUserById($fromData["id"],$fromData["idstat"]);
    }
?>