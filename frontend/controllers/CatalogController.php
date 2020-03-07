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

        if(Yii::$app->request->isGet){
            $fromData = Yii::$app->request->get();

            $model->name = $fromData["name"];

            $model->category = $fromData["category"];

            // $upload_file=$fromData["sound"];
            // $folder="frontend/sound/";
            // move_uploaded_file($fromData["sound"], $folder.$fromData["sound"]);

            // $model->path=$folder.$fromData["sound"];
            

            $_FILES["sound"]["name"]=$fromData["sound"];
            $_FILES["sound"]["tmp_name"]=$fromData["sound"];

            $upload_file=$_FILES["sound"]["name"];
            $folder="frontend/sound/";
            move_uploaded_file($_FILES["sound"]["tmp_name"], $folder.$upload_file);

            $model->path=$folder.$upload_file;

            if($model->validate() && $model->save()){
                Yii::$app->session->setFlash('success','Sound add complited!');
            }
        }

        return $this->render('upload',[
            'model' => $model,
            'categories' => $model->getListCategory()
        ]);
    }

    public function actionComplaint(){
        $id = 0;

        $model= new Complaint();

        if(Yii::$app->request->isGet){
            $fromData = Yii::$app->request->get();

            $id=$fromData["id"];
        }

        if(Yii::$app->request->isPost){
            $fromData = Yii::$app->request->post();

            $model->description = $fromData["description"];

            $model->soundid = $fromData["id"];

            $id=$fromData["id"];

            if($model->validate() && $model->save()){
                Yii::$app->session->setFlash('success','Complaint add complited!');
            }
        }

        return $this->render('complaint',[
            'id' => $id
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