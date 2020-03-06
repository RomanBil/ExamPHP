<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Sound;
use backend\models\CategoryForm;

/**
 * Category controller
 */
class SoundController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new Sound();

        $model2 = new CategoryForm();

        if(Yii::$app->request->isPost){
            $fromData = Yii::$app->request->post();

            $model->id = $fromData["id"];

            $model->categoryid = $fromData["categoryid"];

            if($model->validate() && $model->update()){
                Yii::$app->session->setFlash('success','Sound update complited!');
            }
        }

        return $this->render('index',[
            'model' => $model,
            'sounds' => $model->getListSound(),
            'categories' => $model2->getListCategory()
            ]);
    }

    public function beforeAction($action)
    {
        if (in_array($action->id, ['index'])) {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }
}