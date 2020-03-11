<?php
namespace frontend\models;

use yii\db\ActiveRecord;

class Complaint extends ActiveRecord
{
    public static function tableName(){
        return '{{complaint}}';
    }

    public function rules()
    {
        return [
            [['description','soundid'], 'required'],
        ];
    }
}