<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

class Complaint extends Model
{
    public $description;

    public $soundid;

    public function rules()
    {
        return [
            [['description','soundid'], 'required'],
        ];
    }

    public function save(){
        $sql = "INSERT INTO complaint (id,description,soundid) 
        VALUES(null,'$this->description',$this->soundid)";
        
        return Yii::$app->db->createCommand($sql)->execute();
    }
}