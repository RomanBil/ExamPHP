<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;

class CategoryForm extends ActiveRecord
{
    public $name;

    public static function tableName(){
        return '{{categorysound}}';
    }

    public function rules()
    {
        return [
            [['name','id'], 'required'],
        ];
    }

    // public function save(){
    //     $sql = "INSERT INTO categorysound (id,name) VALUES(null,'$this->name')";
    //     return Yii::$app->db->createCommand($sql)->execute();
    // }

    public function getListCategory(){
        $sql = "SELECT * FROM categorysound";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public function deleteCategoryById($id){
        $sql = "DELETE FROM categorysound WHERE id=$id";
        return Yii::$app->db->createCommand($sql)->execute();
    }
}