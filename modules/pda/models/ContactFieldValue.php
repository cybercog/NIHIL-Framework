<?php

namespace app\modules\pda\models;

use Yii;

/**
 * This is the model class for table "pda_contact_field_values".
 *
 * @property integer $id
 * @property integer $contact_id
 * @property integer $field_id
 * @property string $label
 * @property string $value
 */
class ContactFieldValue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pda_contact_field_values';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contact_id', 'field_id', 'label', 'value'], 'required'],
            [['contact_id', 'field_id'], 'integer'],
            [['value'], 'string'],
            [['label'], 'string', 'max' => 128]
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
            'field_id' => 'Field ID',
            'label' => 'Label',
            'value' => 'Value',
        ];
    }
}
