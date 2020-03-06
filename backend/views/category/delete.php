<?php
    use backend\models\CategoryForm;

    if(Yii::$app->request->isGet){
        $fromData = Yii::$app->request->get();

        $model = new CategoryForm();

        $model ->deleteCategoryById($fromData["id"]);
    }
?>