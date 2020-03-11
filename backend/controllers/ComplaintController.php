<?php
namespace backend\controllers;

use Yii;
use backend\models\Complaint;

/**
 * Category controller
 */
class ComplaintController extends \yii\web\Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new Complaint();

        // $complaints = Complaint::find()
        // ->all();

        return $this->render('index',[
            'model' => $model,
            'complaints' => $model->getListComplaint(),
            'sounds' => $model->getListSound()
        ]);
    }
}