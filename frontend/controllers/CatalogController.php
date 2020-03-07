<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Catalog;

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
}