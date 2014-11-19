<?php

namespace app\modules\ac\models;

use Yii;

/**
 * This is the model class for table "ac_sessions".
 *
 * @property string $session_id
 * @property integer $user_id
 * @property string $date_created
 * @property string $date_expires
 *
 * @property AcUsers $user
 */
class Session extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ac_sessions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['session_id', 'user_id', 'date_created', 'date_expires'], 'required'],
            [['user_id'], 'integer'],
            [['date_created', 'date_expires'], 'safe'],
            [['session_id'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'session_id' => 'Session ID',
            'user_id' => 'User ID',
            'date_created' => 'Date Created',
            'date_expires' => 'Date Expires',
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
