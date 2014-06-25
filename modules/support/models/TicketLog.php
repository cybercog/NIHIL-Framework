<?php

namespace app\modules\support\models;

use Yii;

/**
 * This is the model class for table "support_ticket_logs".
 *
 * @property integer $id
 * @property integer $ticket_id
 * @property string $timestamp
 * @property string $action
 */
class TicketLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support_ticket_logs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ticket_id', 'timestamp', 'action'], 'required'],
            [['ticket_id'], 'integer'],
            [['timestamp'], 'safe'],
            [['action'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ticket_id' => 'Ticket ID',
            'timestamp' => 'Timestamp',
            'action' => 'Action',
        ];
    }
}
