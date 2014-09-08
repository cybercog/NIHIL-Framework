<?php

namespace app\modules\pda\models;

use Yii;

/**
 * This is the model class for table "pda_unsubscribed_emails".
 *
 * @property integer $id
 * @property integer $mailing_list_id
 * @property string $email
 * @property string $timestamp
 */
class UnsubscribedEmail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pda_unsubscribed_emails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mailing_list_id'], 'integer'],
            [['email', 'timestamp'], 'required'],
            [['timestamp'], 'safe'],
            [['email'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mailing_list_id' => 'Mailing List ID',
            'email' => 'Email',
            'timestamp' => 'Timestamp',
        ];
    }
}
