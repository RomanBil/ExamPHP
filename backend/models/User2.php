<?php
namespace backend\models;

use yii\db\ActiveRecord;

class User2 extends ActiveRecord
{
    public static function tableName(){
        return '{{user}}';
    }

    public function rules()
    {
        return [
            [['username','password_hash','email','idrole','statusid','auth_key','created_at',
            'updated_at','verification_token'], 'required'],
            [['email'],'email']
        ];
    }
}