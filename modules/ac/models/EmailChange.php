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
 *
 * @property AcUsers $user
 */
class EmailChange extends \yii\db\ActiveRecord
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
            [['user_id', 'email', 'date_created', 'ip_address', 'user_agent'], 'required'],
            [['user_id'], 'integer'],
            [['date_created'], 'safe'],
            [['email', 'user_agent'], 'string', 'max' => 128],
            [['ip_address'], 'string', 'max' => 100],
            [['user_id'], 'unique']
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(AcUsers::className(), ['id' => 'user_id']);
    }
}
