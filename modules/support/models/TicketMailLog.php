<?php

namespace app\modules\support\models;

use Yii;

/**
 * This is the model class for table "support_ticket_mail_logs".
 *
 * @property integer $id
 * @property string $recipient_email
 * @property string $sender_name
 * @property string $sender_email
 * @property string $timestamp
 * @property string $subject
 * @property string $message
 * @property string $action
 */
class TicketMailLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support_ticket_mail_logs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recipient_email', 'sender_name', 'sender_email', 'timestamp', 'subject', 'message', 'action'], 'required'],
            [['recipient_email', 'sender_name', 'sender_email', 'subject', 'message', 'action'], 'string'],
            [['timestamp'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'recipient_email' => 'Recipient Email',
            'sender_name' => 'Sender Name',
            'sender_email' => 'Sender Email',
            'timestamp' => 'Timestamp',
            'subject' => 'Subject',
            'message' => 'Message',
            'action' => 'Action',
        ];
    }
}
