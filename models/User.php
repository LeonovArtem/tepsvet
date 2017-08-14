<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     * Этот метод находит экземпляр identity class, используя ID пользователя. Этот метод используется,
     * когда необходимо поддерживать состояние аутентификации через сессии.
     * findIdentityByAccessToken(): Этот метод находит экземпляр identity class, используя токен доступа.
     * Метод используется, когда требуется аутентифицировать пользователя только по секретному токену
     * (например в RESTful приложениях, не сохраняющих состояние между запросами).
     */

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    public function getStatus()
    {
        return $this->hasOne(UserRole::className(), ['id' => 'role']);
    }

    /**
     * Finds user by username
     *
     * @param string $login
     * @return static|null
     */
    public static function findByLogin($login)
    {
        return static::findOne(['login' => $login]);
    }

    /**
     * @inheritdoc
     * Этот метод возвращает ID пользователя, представленного данным экземпляром identity
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     * тот метод возвращает ключ, используемый для основанной на cookie аутентификации.
     * Ключ сохраняется в аутентификационной cookie и позже сравнивается с версией, находящейся на сервере,
     * чтобы удостоверится, что аутентификационная cookie верная.
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     * Этот метод реализует логику проверки ключа для основанной на cookie аутентификации.
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
//        ($password==$this->password)?true;

    }

    public function generateAuthKey()
    {
        $this->auth_key = \Yii::$app->security->generateRandomString();
    }

}
