<?php

namespace app\modules\pda\models;

use Yii;

/**
 * This is the model class for table "pda_contact_fields".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $validation
 */
class ContactField extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pda_contact_fields';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'description'], 'required'],
            [['description', 'validation'], 'string'],
            [['name', 'slug'], 'string', 'max' => 128]
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
            'validation' => 'Validation',
        ];
    }
}
