<?php

namespace app\modules\support\models;

use Yii;

/**
 * This is the model class for table "support_tickets".
 *
 * @property integer $id
 * @property string $ref_code
 * @property integer $parent
 * @property integer $type
 * @property integer $status
 * @property integer $priority
 * @property string $name
 * @property string $slug
 * @property integer $reporter
 * @property integer $assignee
 * @property string $date_reported
 * @property string $date_assigned
 * @property string $date_edited
 * @property string $date_estimated
 * @property string $date_resolved
 * @property string $time_estimated
 * @property string $time_actual
 * @property integer $resolution
 * @property string $message
 * @property string $details
 *
 * @property SupportTicketLogs[] $supportTicketLogs
 * @property SupportTicketReplies[] $supportTicketReplies
 * @property Ticket $parent0
 * @property Ticket[] $tickets
 * @property SupportTicketTypes $type0
 * @property SupportTicketStatuses $status0
 * @property SupportTicketPriorities $priority0
 * @property AcUsers $reporter0
 * @property AcUsers $assignee0
 * @property SupportTicketResolutions $resolution0
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support_tickets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref_code', 'type', 'status', 'priority', 'name', 'slug', 'reporter', 'assignee', 'resolution', 'message'], 'required'],
            [['parent', 'type', 'status', 'priority', 'reporter', 'assignee', 'resolution'], 'integer'],
            [['date_reported', 'date_assigned', 'date_edited', 'date_estimated', 'date_resolved', 'time_estimated', 'time_actual'], 'safe'],
            [['message', 'details'], 'string'],
            [['ref_code'], 'string', 'max' => 32],
            [['name', 'slug'], 'string', 'max' => 100],
            [['slug'], 'unique'],
            [['ref_code'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref_code' => 'Ref Code',
            'parent' => 'Parent',
            'type' => 'Type',
            'status' => 'Status',
            'priority' => 'Priority',
            'name' => 'Name',
            'slug' => 'Slug',
            'reporter' => 'Reporter',
            'assignee' => 'Assignee',
            'date_reported' => 'Date Reported',
            'date_assigned' => 'Date Assigned',
            'date_edited' => 'Date Edited',
            'date_estimated' => 'Date Estimated',
            'date_resolved' => 'Date Resolved',
            'time_estimated' => 'Time Estimated',
            'time_actual' => 'Time Actual',
            'resolution' => 'Resolution',
            'message' => 'Message',
            'details' => 'Details',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportTicketLogs()
    {
        return $this->hasMany(SupportTicketLogs::className(), ['ticket_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportTicketReplies()
    {
        return $this->hasMany(SupportTicketReplies::className(), ['ticket_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(Ticket::className(), ['id' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['parent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(SupportTicketTypes::className(), ['id' => 'type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(SupportTicketStatuses::className(), ['id' => 'status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPriority0()
    {
        return $this->hasOne(SupportTicketPriorities::className(), ['id' => 'priority']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReporter0()
    {
        return $this->hasOne(AcUsers::className(), ['id' => 'reporter']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssignee0()
    {
        return $this->hasOne(AcUsers::className(), ['id' => 'assignee']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResolution0()
    {
        return $this->hasOne(SupportTicketResolutions::className(), ['id' => 'resolution']);
    }
}
