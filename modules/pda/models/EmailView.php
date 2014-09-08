<?php

namespace app\modules\pda\models;

use Yii;

/**
 * This is the model class for table "pda_email_views".
 *
 * @property integer $id
 * @property integer $email_id
 * @property integer $user_id
 * @property string $timestamp
 * @property string $ip_address
 * @property string $user_agent
 */
class EmailView extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pda_email_views';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email_id', 'timestamp', 'ip_address', 'user_agent'], 'required'],
            [['email_id', 'user_id'], 'integer'],
            [['timestamp'], 'safe'],
            [['ip_address'], 'string', 'max' => 64],
            [['user_agent'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email_id' => 'Email ID',
            'user_id' => 'User ID',
            'timestamp' => 'Timestamp',
            'ip_address' => 'Ip Address',
            'user_agent' => 'User Agent',
        ];
    }
}
