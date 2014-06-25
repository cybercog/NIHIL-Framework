<?php

namespace app\modules\ac\models;

use Yii;

/**
 * This is the model class for table "ac_email_changes".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $email
 * @property string $date_created
 * @property string $ip_address
 * @property string $user_agent
 */
class EmailChanges extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ac_email_changes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'email', 'ip_address', 'user_agent'], 'required'],
            [['user_id'], 'integer'],
            [['date_created'], 'safe'],
            [['email', 'user_agent'], 'string', 'max' => 128],
            [['ip_address'], 'string', 'max' => 100],
            ['email', 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'email' => 'Email',
            'date_created' => 'Date Created',
            'ip_address' => 'Ip Address',
            'user_agent' => 'User Agent',
        ];
    }
	
	public function beforeSave($insert)
	{
		if (parent::beforeSave($insert)) {
			if ($this->isNewRecord) {
				$this->date_created = date("Y-m-d H:i:s");
			}
			return true;
		}
		return false;
	}
}
