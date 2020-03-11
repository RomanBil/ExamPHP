<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;

class Complaint extends ActiveRecord
{
    public function getListComplaint(){
        $sql = "SELECT * FROM complaint";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public function getListSound(){
        $sql = "SELECT * FROM sound";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    // public function getSound(){
    //     return $this->hasOne(Sound::className(), ['id'=>'soundid'])->one();
    // }

    // public function getSoundName(){
    //     if($sound =  $this->getSound()){
    //         return $sound->name;
    //     }
    //     return "no set name";
    // }
}