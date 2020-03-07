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
}