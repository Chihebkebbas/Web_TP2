<?php

namespace app\models;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;



    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $myUser = MyUsers::findOne($id);
        if($myUser) {
            $user = new static();
            $user->id = $id;
            $user->username = $myUser->identifiant;
            return $user;
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $myUser = MyUsers::findOne(['accessToken' => $token]);
        if($myUser) {
            $user = new static();
            $user->accessToken = $token;
            $user->id = $myUser->id;
            $user->username = $myUser->identifiant;
            return $user;
        }
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return MyUsers
     */
    public static function findByUsername($username)
    {
        $myUser = MyUsers::findOne(['identifiant' => $username]);
        if($myUser) {
            $user = new static();
            $user->username = $username;
            $user->id = $myUser->id;
            $user->password = $myUser->motpasse;
            return $user;
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === sha1($password);
    }
}
