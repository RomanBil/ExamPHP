<?php
namespace backend\models;

use Yii;
use yii\base\Model;

class User extends Model
{
    public $id;
    public $username;
    public $password;
    public $password2;
    public $email;
    public $role;
    public $status;

    public function rules()
    {
        return [
            [['username','password','password2','email','role','status'], 'required'],
            [['email'],'email'],
            ['password2', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public function save(){
        $password_hash = Yii::$app->security->generatePasswordHash($this->password);
        $auth_key = Yii::$app->security->generateRandomString();
        $verification_token = Yii::$app->security->generateRandomString() . '_' . time();

        $sql = "INSERT INTO user (id,username,password_hash,email,idrole,statusid,auth_key,created_at,updated_at,verification_token) 
        VALUES(null,'$this->username','$password_hash','$this->email',$this->role,$this->status,
        '$auth_key',1583523345,1583523392,'$verification_token')";

        return Yii::$app->db->createCommand($sql)->execute();
    }

    public function getListRoles(){
        $sql = "SELECT * FROM roles";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public function getListStatus(){
        $sql = "SELECT * FROM statususer";
        return Yii::$app->db->createCommand($sql)->queryAll();
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