<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\User;
use backend\models\User3;

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
        
        if ($model->load(Yii::$app->request->post()) && $model->index()) {//&& $model->index()
            Yii::$app->session->setFlash('success', 'Thank you for registration.');
            return $this->goHome();
        }

        return $this->render('index',[
            'model' => $model
            ]);
    }

    public function actionUsers(){
        $model = new User();

        if(Yii::$app->request->isPost){
            $fromData = Yii::$app->request->post();

            $model->statusid = $fromData["statusid"];

            $model->username = $fromData["username"];

            if($model->updateUser()){
                Yii::$app->session->setFlash('success','User update complited!');
            }
        }

        return $this->render('users',[
            'users' => $model->getListUsers(),
            'statuses' => $model->getListStatus2()
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