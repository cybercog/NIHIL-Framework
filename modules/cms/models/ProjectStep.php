<?php

namespace app\modules\cms\models;

use Yii;

/**
 * This is the model class for table "cms_project_steps".
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $type
 * @property string $image
 * @property string $time_estimated
 * @property string $content
 * @property integer $order
 */
class ProjectStep extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_project_steps';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'type', 'time_estimated', 'content', 'order'], 'required'],
            [['project_id', 'type', 'order'], 'integer'],
            [['time_estimated'], 'safe'],
            [['content'], 'string'],
            [['image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'type' => 'Type',
            'image' => 'Image',
            'time_estimated' => 'Time Estimated',
            'content' => 'Content',
            'order' => 'Order',
        ];
    }
}
