<?php

namespace app\modules\ac\models;

use Yii;

/**
 * This is the model class for table "ac_password_changes".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $hash
 * @property string $date_created
 * @property string $date_expires
 * @property string $ip_address
 * @property string $user_agent
 *
 * @property AcUsers $user
 */
class PasswordChange extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ac_password_changes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'hash', 'date_created', 'date_expires', 'ip_address', 'user_agent'], 'required'],
            [['user_id'], 'integer'],
            [['date_created', 'date_expires'], 'safe'],
            [['hash', 'user_agent'], 'string', 'max' => 128],
            [['ip_address'], 'string', 'max' => 100]
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
            'hash' => 'Hash',
            'date_created' => 'Date Created',
            'date_expires' => 'Date Expires',
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
