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
}