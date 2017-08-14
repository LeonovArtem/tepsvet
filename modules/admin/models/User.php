<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $login
 * @property string $password
 * @property string $auth_key
 * @property integer $role
 * @property string $img_profil
 *
 * @property UserRole $userRole
 */
class User extends \yii\db\ActiveRecord
{
    public function getStatus()
    {
        return $this->hasOne(UserRole::className(), ['id' => 'role']);
    }

    public function getAvatarImage()
    {
        return $this->img_profil;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'login', 'password'], 'required'],
            [['role'], 'integer'],
            [['username', 'login'], 'string', 'max' => 50],
            [['password', 'auth_key', 'img_profil'], 'string', 'max' => 255],
//            [['role'], 'unique'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Имя пользователя',
            'login' => 'Логин',
            'password' => 'Пароль',
            'auth_key' => 'Auth Key',
            'role' => 'Роль',
            'img_profil' => 'Аватарка',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRole()
    {
        return $this->hasOne(UserRole::className(), ['id' => 'role']);
    }

    public function generatePassword($password)
    {
        $this->password = Yii::$app->getSecurity()->generatePasswordHash($password);
    }

}
