<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

class Catalog extends Model
{
    public $name;

    public $category;

    public $path;

    public function rules()
    {
        return [
            [['name','category','path'], 'required'],
        ];
    }

    public function save(){
        $sql = "INSERT INTO sound (id,name,path,categoryId) 
        VALUES(null,'$this->name','$this->path',$this->category)";
        
        return Yii::$app->db->createCommand($sql)->execute();
    }

    public function getListSound(){
        $sql = "SELECT * FROM sound ORDER BY categoryid";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public function getSoundByName($name){
        $sql = "SELECT * FROM sound WHERE name='$name'";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public function getListCategory(){
        $sql = "SELECT * FROM categorysound";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }
}