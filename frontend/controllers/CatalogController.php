<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Catalog;
use frontend\models\Complaint;

use yii\web\UploadedFile;

class CatalogController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new Catalog();

        return $this->render('index',[
            'sounds' => $model->getListSound()
        ]);
    }

    public function actionSound()
    {
        $model = new Catalog();

        if(Yii::$app->request->isGet){
            $fromData = Yii::$app->request->get();

            if($fromData['search']==""){
                $sound="sound not found";
            }

            else{
                $sound = $model->getSoundByName($fromData['search']);

                if(!is_array($sound[0])){
                    $sound="sound not found";
                }
            }
        }

        return $this->render('sound',[
            'sound' => $sound[0]
        ]);
    }

    public function actionUpload(){
        $model = new Catalog();

        if($model->load(Yii::$app->request->post())){
            $model->path = UploadedFile::getInstance($model, 'path');
            //print_r($model->path);die;
                if (Yii::$app->params['maxFileSize'] >= $model->path->size && $model->upload()) {
                    Yii::$app->session->setFlash('success','Added!');

                    return $this->refresh();
                }
        }

        return $this->render('upload',[
            'model' => $model
        ]);
    }

    public function actionComplaint(){
        $id = 0;

        $model = new Complaint();

        if(Yii::$app->request->isGet){
            $fromData = Yii::$app->request->get();

            $id=$fromData["soundid"];
        }

        if($model->load(Yii::$app->request->post()) && $model->save()){
            $fromData = Yii::$app->request->post();

            $id=$fromData["soundid"];

            Yii::$app->session->setFlash('success','Added!');

            return $this->refresh();
        }

        return $this->render('complaint',[
            'model' => $model,
            'soundid' => $id
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