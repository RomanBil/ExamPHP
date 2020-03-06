<?php

namespace backend\models;

use Yii;
use yii\base\Model;

class CategoryForm extends Model
{
    public $name;

    public function rules()
    {
        return [
            [['name'], 'required'],
        ];
    }

    public function save(){
        $sql = "INSERT INTO categorysound (id,name) VALUES(null,'$this->name')";
        return Yii::$app->db->createCommand($sql)->execute();
    }

    public function getListCategory(){
        $sql = "SELECT * FROM categorysound";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public function deleteCategoryById($id){
        $sql = "DELETE FROM categorysound WHERE id=$id";
        return Yii::$app->db->createCommand($sql)->execute();
    }
}