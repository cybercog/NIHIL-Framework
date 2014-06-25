<?php

namespace app\modules\support\models;

use Yii;

/**
 * This is the model class for table "support_ticket_types".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $description
 */
class TicketType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support_ticket_types';
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
}
