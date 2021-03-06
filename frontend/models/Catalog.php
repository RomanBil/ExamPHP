<?php
namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Catalog extends ActiveRecord
{
    public static function tableName(){
        return '{{sound}}';
    }

    public function rules()
    {
        return [
            [['name','categoryId','path'], 'required'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->path->saveAs('@frontend/web/uploads/' . $this->path->baseName . '.' . $this->path->extension);
            $this->path = '/uploads/' . $this->path->baseName . '.' . $this->path->extension;
            $this->save();
            return true;
        } else {
            return false;
        }
    }

    public function getListSound(){
        $sql = "SELECT * FROM sound";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public function getSortListSound($categoryId){
        $sql = "SELECT * FROM sound where categoryId=$categoryId";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public function getSoundByName($name){
        $sql = "SELECT * FROM sound WHERE name='$name'";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public function getListCategory(){
        $sql = "SELECT * FROM categorysound";
        $result =  Yii::$app->db->createCommand($sql)->queryAll();

        return ArrayHelper::map($result, 'id','name');
    }
}