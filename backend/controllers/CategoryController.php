<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\CategoryForm;

/**
 * Category controller
 */
class CategoryController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new CategoryForm();

        //print_r($model->getListCategory());die;

        if(Yii::$app->request->isPost){
            $fromData = Yii::$app->request->post();

            $model->name = $fromData["name"];

            if($model->validate() && $model->save()){
                Yii::$app->session->setFlash('success','Category add complited!');
            }
        }

        return $this->render('index',[
            'model' => $model,
            'categories' => $model->getListCategory()
            ]);

        // return $this->render('index');
    }

    public function actionDelete(){
        return $this->render('delete');
    }

    public function beforeAction($action)
    {
        if (in_array($action->id, ['index'])) {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }
}