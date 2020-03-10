<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\User;

/**
 * Category controller
 */
class UserController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new User();

        if(Yii::$app->request->isPost){
            $fromData = Yii::$app->request->post();

            $model->attributes = $fromData;

            if($model->validate() && $model->save()){
                Yii::$app->session->setFlash('success','User add complited!');
            }
        }

        return $this->render('index',[
            'model' => $model
            ]);
    }

    public function actionUsers(){
        $model = new User();

        return $this->render('users',[
            'users' => $model->getListUsers(),
            'statuses' => $model->getListStatus()
        ]);
    }

    public function actionUpdate(){
        return $this->render('update');
    }

    public function beforeAction($action)
    {
        if (in_array($action->id, ['index'])) {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }
}