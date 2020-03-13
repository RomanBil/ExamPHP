<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Sound2 extends ActiveRecord
{
    const SCENARIO_SOUND_CREATE = 'sound_create';
    const SCENARIO_SOUND_UPDATE= 'sound_update';

    public static function tableName(){
        return'{{sound}}';
    }

    public function scenarios(){
        return [
            self::SCENARIO_SOUND_CREATE =>[
                'categoryId','name','path'
            ],
            self::SCENARIO_SOUND_UPDATE =>[
                'categoryId','name','path'
            ],
        ];
    }

    public function rules()
    {
        return [
            [['categoryId','name'], 'required'],
            [['path'],'required','on' => self::SCENARIO_SOUND_CREATE],
            //[['path'],'unsafe','on'=>'update']
            //[['path'],'default','setOnEmpty'=>false,'on'=>'update']
            //[['path'],'skipOnEmpty' => true]
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

    public function getListCategory(){
        $sql = "SELECT * FROM categorysound";
        $result =  Yii::$app->db->createCommand($sql)->queryAll();

        return ArrayHelper::map($result, 'id','name');
    }

    // public function beforeSave()
    // {
    //     if ($this->getIsNewRecord())
    //     {
    //         $this->path = Yii::$app->user->id;
    //     }
    //     //return parent::beforeSave();
    // }
}