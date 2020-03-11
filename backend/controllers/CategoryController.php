<?php
namespace backend\controllers;

use Yii;
use backend\models\CategoryForm;

/**
 * Category controller
 */
class CategoryController extends \yii\web\Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new CategoryForm();
        
        if($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('success','Added!');

            return $this->refresh();
        }

        return $this->render('index',[
                'model' => $model,
                'categories' => $model->getListCategory()
                ]);
    }

    public function actionDelete()
    {
        if(Yii::$app->request->isGet){
            $fromData = Yii::$app->request->get();

            //print_r($fromData);die;

            $model = new CategoryForm();

            $model ->deleteCategoryById($fromData["id"]);

            Yii::$app->session->setFlash('success','Deleted!');
        }

        $this->redirect('/category/index');
        //return $this->render('delete');
    }

    public function beforeAction($action)
    {
        if (in_array($action->id, ['index'])) {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }
}