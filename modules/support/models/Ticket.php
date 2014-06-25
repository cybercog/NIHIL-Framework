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
            [['slug'], 'unique']
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
}
