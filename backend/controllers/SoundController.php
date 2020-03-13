<?php

namespace backend\controllers;

use Yii;
use backend\models\Sound2;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SoundController implements the CRUD actions for Sound2 model.
 */
class SoundController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Sound2 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Sound2::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sound2 model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Sound2 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sound2();

        $model->scenario = Sound2::SCENARIO_SOUND_CREATE;

        if($model->load(Yii::$app->request->post())){
            $post = Yii::$app->request->post();

            $model->categoryId=$post['Sound2']['categoryId'];

            $model->path = UploadedFile::getInstance($model, 'path');
                if (Yii::$app->params['maxFileSize'] >= $model->path->size) {
                    if($model->upload()){
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
                else{
                    Yii::$app->session->setFlash('error','File size too large');

                    return $this->refresh();
                }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Sound2 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $path = $model->path;
        $model->scenario = Sound2::SCENARIO_SOUND_UPDATE;

        if($model->load(Yii::$app->request->post())){
            $post = Yii::$app->request->post();

            $model->categoryId=$post['Sound2']['categoryId'];

            $model->path = UploadedFile::getInstance($model, 'path');

            if($model->path){
                if (Yii::$app->params['maxFileSize'] >= $model->path->size) {
                    if($model->upload()){
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }
                else{
                    Yii::$app->session->setFlash('error','File size too large');

                    return $this->refresh();
                }
            }

            else{
                $model->path = $path;

                $model->save();

                return $this->redirect(['view', 'id' => $model->id]);
            } 
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Sound2 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sound2 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sound2 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sound2::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
