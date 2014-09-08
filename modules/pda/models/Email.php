<?php

namespace app\modules\pda\models;

use Yii;

/**
 * This is the model class for table "pda_emails".
 *
 * @property integer $id
 * @property integer $contact_id
 * @property integer $user_id
 * @property string $token
 * @property string $date_sent
 * @property string $date_first_opened
 * @property string $subject
 * @property string $content
 * @property string $date_last_view
 * @property integer $views
 */
class Email extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pda_emails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contact_id', 'token', 'date_sent', 'subject', 'content', 'views'], 'required'],
            [['contact_id', 'user_id', 'views'], 'integer'],
            [['date_sent', 'date_first_opened', 'date_last_view'], 'safe'],
            [['content'], 'string'],
            [['token'], 'string', 'max' => 128],
            [['subject'], 'string', 'max' => 255],
            [['token'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contact_id' => 'Contact ID',
            'user_id' => 'User ID',
            'token' => 'Token',
            'date_sent' => 'Date Sent',
            'date_first_opened' => 'Date First Opened',
            'subject' => 'Subject',
            'content' => 'Content',
            'date_last_view' => 'Date Last View',
            'views' => 'Views',
        ];
    }
}
