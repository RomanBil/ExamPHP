<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;

class User extends ActiveRecord
{
    // public $id;
    // public $username;
    // public $password;
    // public $password2;
    // public $email;
    // public $role;
    // public $status;

    public static function tableName(){
        return '{{user}}';
    }

    public function rules()
    {
        return [
            [['username','password_hash','email','idrole','statusid'], 'required'],
            [['email'],'email'],
        ];
    }

    // public function save(){
    //     $password_hash = Yii::$app->security->generatePasswordHash($this->password);
    //     $auth_key = Yii::$app->security->generateRandomString();
    //     $verification_token = Yii::$app->security->generateRandomString() . '_' . time();

    //     $sql = "INSERT INTO user (id,username,password_hash,email,idrole,statusid,auth_key,created_at,updated_at,verification_token) 
    //     VALUES(null,'$this->username','$password_hash','$this->email',$this->role,$this->status,
    //     '$auth_key',1583523345,1583523392,'$verification_token')";

    //     return Yii::$app->db->createCommand($sql)->execute();
    // }

    public function getListRoles(){
        $sql = "SELECT * FROM roles";
        $result = Yii::$app->db->createCommand($sql)->queryAll();

        return ArrayHelper::map($result, 'id','name');
    }

    public function getListStatus(){
        $sql = "SELECT * FROM statususer";
        $result = Yii::$app->db->createCommand($sql)->queryAll();

        return ArrayHelper::map($result, 'id','name');
    }

    public function getListUsers(){
        $sql = "SELECT * FROM user";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public function updateUserById($id,$idstat){
        $sql = "UPDATE user set statusid = $idstat where id= $id";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }
}