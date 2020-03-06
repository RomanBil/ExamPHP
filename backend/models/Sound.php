<?php

namespace backend\models;

use Yii;
use yii\base\Model;

class Sound extends Model
{
    public $id;

    public $categoryid;

    public function rules()
    {
        return [
            [['categoryid'], 'required'],
        ];
    }

    public function update(){
        $sql = "update sound set categoryid = $this->categoryid where id= $this->id";
        return Yii::$app->db->createCommand($sql)->execute();
    }

    public function getListSound(){
        $sql = "SELECT * FROM sound";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }
}