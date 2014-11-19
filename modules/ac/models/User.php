<?php

namespace app\modules\ac\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

use app\modules\ecom\models\Contact;

/**
 * This is the model class for table "ac_users".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $nickname
 * @property string $birthday
 * @property string $credit
 * @property string $auth_key
 * @property string $date_created
 * @property string $date_last_login
 * @property string $last_login_ip
 * @property integer $login_attempts
 * @property string $details
 *
 * @property AcAuthAssignments[] $acAuthAssignments
 * @property AcAuthKeys[] $acAuthKeys
 * @property AcEmailChanges[] $acEmailChanges
 * @property AcPasswordChanges[] $acPasswordChanges
 * @property AcSessionLogs[] $acSessionLogs
 * @property CmsCommentHistories[] $cmsCommentHistories
 * @property CmsCommentVotes[] $cmsCommentVotes
 * @property CmsComments[] $cmsComments
 * @property CmsLinksLogs[] $cmsLinksLogs
 * @property CmsPageHistories[] $cmsPageHistories
 * @property CmsPageViews[] $cmsPageViews
 * @property CmsPages[] $cmsPages
 * @property CmsPostHistories[] $cmsPostHistories
 * @property CmsPostViews[] $cmsPostViews
 * @property CmsPostVotes[] $cmsPostVotes
 * @property CmsPosts[] $cmsPosts
 * @property CmsProjects[] $cmsProjects
 * @property SupportForumPostHistories[] $supportForumPostHistories
 * @property SupportForumPostVotes[] $supportForumPostVotes
 * @property SupportForumPosts[] $supportForumPosts
 * @property SupportForumReplies[] $supportForumReplies
 * @property SupportForumReplyHistories[] $supportForumReplyHistories
 * @property SupportForumReplyVotes[] $supportForumReplyVotes
 * @property SupportTicketReplies[] $supportTicketReplies
 * @property SupportTickets[] $supportTickets
 * @property Contact[] $contact
 */
class User extends ActiveRecord  implements IdentityInterface
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
            [['username', 'email', 'password', 'first_name', 'last_name', 'birthday', 'credit', 'auth_key', 'date_created'], 'required'],
            [['birthday', 'date_created', 'date_last_login', 'contact_id'], 'safe'],
            [['credit'], 'number'],
            [['login_attempts'], 'integer'],
            [['details'], 'string'],
            [['username', 'first_name', 'last_name'], 'string', 'max' => 100],
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
			'contact_id' => 'Contact',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'first_name' => 'First Name',
			'last_name' => 'Last Name',
            'birthday' => 'Birthday',
            'credit' => 'Credit',
            'auth_key' => 'Auth Key',
            'date_created' => 'Date Created',
            'date_last_login' => 'Date Last Login',
            'last_login_ip' => 'Last Login Ip',
            'login_attempts' => 'Login Attempts',
            'details' => 'Details',
        ];
    }
	
	public function beforeSave($insert)
	{
		if (parent::beforeSave($insert)) {
			if ($this->isNewRecord) {
				$this->auth_key = Yii::$app->getSecurity()->generateRandomString();
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
        $this->auth_key = \Yii::$app->getSecurity()->generateRandomString();
    }
	
	/**
     * Get list of users for creating dropdowns
     *
     * @return array
     */
    public static function dropdown() {

        // get data if needed
        static $dropdown;
        if ($dropdown === null) {

            // get all records from database and generate
            $models = static::find()->all();
            foreach ($models as $model) {
                $dropdown[$model->id] = $model->username;
            }
        }

        return $dropdown;
    }
	
	public function getUserID() {
		return $this->id;
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcAuthAssignments()
    {
        return $this->hasMany(AcAuthAssignments::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcAuthKeys()
    {
        return $this->hasMany(AcAuthKeys::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcEmailChanges()
    {
        return $this->hasMany(AcEmailChanges::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcPasswordChanges()
    {
        return $this->hasMany(AcPasswordChanges::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcSessionLogs()
    {
        return $this->hasMany(AcSessionLogs::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsCommentHistories()
    {
        return $this->hasMany(CmsCommentHistories::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsCommentVotes()
    {
        return $this->hasMany(CmsCommentVotes::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsComments()
    {
        return $this->hasMany(CmsComments::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsLinksLogs()
    {
        return $this->hasMany(CmsLinksLogs::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsPageHistories()
    {
        return $this->hasMany(CmsPageHistories::className(), ['author' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsPageViews()
    {
        return $this->hasMany(CmsPageViews::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsPages()
    {
        return $this->hasMany(CmsPages::className(), ['author' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsPostHistories()
    {
        return $this->hasMany(CmsPostHistories::className(), ['author' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsPostViews()
    {
        return $this->hasMany(CmsPostViews::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsPostVotes()
    {
        return $this->hasMany(CmsPostVotes::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsPosts()
    {
        return $this->hasMany(CmsPosts::className(), ['author' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsProjects()
    {
        return $this->hasMany(CmsProjects::className(), ['author_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportForumPostHistories()
    {
        return $this->hasMany(SupportForumPostHistories::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportForumPostVotes()
    {
        return $this->hasMany(SupportForumPostVotes::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportForumPosts()
    {
        return $this->hasMany(SupportForumPosts::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportForumReplies()
    {
        return $this->hasMany(SupportForumReplies::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportForumReplyHistories()
    {
        return $this->hasMany(SupportForumReplyHistories::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportForumReplyVotes()
    {
        return $this->hasMany(SupportForumReplyVotes::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportTicketReplies()
    {
        return $this->hasMany(SupportTicketReplies::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportTickets()
    {
        return $this->hasMany(SupportTickets::className(), ['assignee' => 'id']);
    }
	
	/**
     * @return \yii\db\ActiveQuery
     */
    public function getContact()
    {
        return $this->hasOne(Contact::className(), ['id' => 'contact_id']);
    }
}
