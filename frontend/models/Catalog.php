<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

class Catalog extends Model
{
    public function getListSound(){
        $sql = "SELECT * FROM sound ORDER BY categoryid";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public function getSoundByName($name){
        $sql = "SELECT * FROM sound WHERE name='$name'";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }
}