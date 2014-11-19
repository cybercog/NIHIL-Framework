<?php

namespace app\modules\support\models;

use Yii;

/**
 * This is the model class for table "support_ticket_statuses".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $description
 *
 * @property SupportTickets[] $supportTickets
 */
class TicketStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support_ticket_statuses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'description'], 'required'],
            [['description'], 'string'],
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
            'name' => 'Name',
            'slug' => 'Slug',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportTickets()
    {
        return $this->hasMany(SupportTickets::className(), ['status' => 'id']);
    }
	
	/**
     * Get list of users for creating dropdowns
     *
     * @return array
     */
    public static function dropdown() {

        // get data if needed
        static $dropdown;
        if ($dropdown === null) {

            // get all records from database and generate
            $models = static::find()->all();
            foreach ($models as $model) {
                $dropdown[$model->id] = $model->name;
            }
        }

        return $dropdown;
    }
}
