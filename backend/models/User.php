<?php
namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;
use backend\models\User2;

class User extends ActiveRecord
{
    public $username;
    public $email;
    public $password;
    public $password2;
    public $idrole;
    public $statusid;

    public function rules()
    {
        return [
            [['username','password','password2','email','idrole','statusid'], 'required'],
            [['email'],'email'],
            ['password2', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public function index()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User2();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password_hash = Yii::$app->security->generatePasswordHash($this->password);
        $user->auth_key=Yii::$app->security->generateRandomString();
        $user->created_at=1583523345;
        $user->updated_at=1583523392;
        $user->idrole = $this->idrole;
        $user->statusid = $this->statusid;
        $user->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
        return $user->save();

    }

    public function updateUser(){
        $sql = "update user set statusid = $this->statusid where username= '$this->username'";
        return Yii::$app->db->createCommand($sql)->execute();
    }

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
    public function getListStatus2(){
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