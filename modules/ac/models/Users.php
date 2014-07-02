<?php

namespace app\modules\ac\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "ac_users".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $nickname
 * @property string $birthday
 * @property string $credit
 * @property string $auth_key
 * @property string $date_created
 * @property string $date_last_login
 * @property string $last_login_ip
 * @property integer $login_attempts
 * @property string $details
 */
class Users extends ActiveRecord implements IdentityInterface
{	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ac_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'nickname', 'birthday', 'credit', 'auth_key'], 'required'],
            [['birthday', 'date_created', 'date_last_login'], 'safe'],
            [['credit'], 'number'],
            [['login_attempts'], 'integer'],
            [['details'], 'string'],
			['username', 'filter', 'filter' => 'trim'],
			['email', 'email'],
            ['email', 'unique', 'targetClass' => '\app\modules\ac\models\Users', 'message' => 'This email address has already been taken.'],
			['username', 'unique', 'targetClass' => '\app\modules\ac\models\Users', 'message' => 'This username has already been taken.'],
            [['username', 'nickname'], 'string', 'min' => 2, 'max' => 100],
            [['email'], 'string', 'max' => 150],
            [['password', 'auth_key'], 'string', 'max' => 128],
            [['last_login_ip'], 'string', 'max' => 16]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'nickname' => 'Nickname',
            'birthday' => 'Birthday',
            'credit' => 'Credit',
            'auth_key' => 'Auth Key',
            'date_created' => 'Date Created',
            'date_last_login' => 'Date Last Login',
            'last_login_ip' => 'Last Login IP',
            'login_attempts' => 'Login Attempts',
            'details' => 'Details',
        ];
    }
	
	public function beforeSave($insert)
	{
		if (parent::beforeSave($insert)) {
			if ($this->isNewRecord) {
				$this->auth_key = Yii::$app->getSecurity()->generateRandomKey();
				$this->date_created = date("Y-m-d H:i:s");
			}
			return true;
		}
		return false;
	}
	
	/**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
	
	/**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }
	
	/**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
	
	/**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = Yii::$app->getSecurity()->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->getSecurity()->generateRandomKey();
    }
	
}
