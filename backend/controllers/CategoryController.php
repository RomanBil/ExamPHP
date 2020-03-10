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
            //var_dump($model->attributes);die;
            
            Yii::$app->session->setFlash('success','Added!');

            return $this->refresh();

            //return $this->redirect('book/index');
        }
        // print_r(Yii::$app->request->post());
        // echo"<br><br><pre>";
        // var_dump($model);
        // echo"</pre>";


        //var_dump($model->errors);die;

        return $this->render('index',[
                'model' => $model,
                'categories' => $model->getListCategory()
                ]);

        // $model = new CategoryForm();

        // if(Yii::$app->request->isPost){
        //     $fromData = Yii::$app->request->post();

        //     $model->name = $fromData["name"];

        //     if($model->validate() && $model->save()){
        //         Yii::$app->session->setFlash('success','Category add complited!');
        //     }
        // }

        // return $this->render('index',[
        //     'model' => $model,
        //     'categories' => $model->getListCategory()
        //     ]);
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