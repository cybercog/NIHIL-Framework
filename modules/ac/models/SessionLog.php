<?php

namespace app\modules\ac\models;

use Yii;

/**
 * This is the model class for table "ac_session_logs".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $timestamp
 * @property string $label
 * @property string $description
 * @property string $ip_address
 * @property string $user_agent
 *
 * @property AcUsers $user
 */
class SessionLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ac_session_logs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'timestamp', 'label', 'description', 'ip_address', 'user_agent'], 'required'],
            [['user_id'], 'integer'],
            [['timestamp'], 'safe'],
            [['description', 'user_agent'], 'string'],
            [['label'], 'string', 'max' => 100],
            [['ip_address'], 'string', 'max' => 64],
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
            'timestamp' => 'Timestamp',
            'label' => 'Label',
            'description' => 'Description',
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
