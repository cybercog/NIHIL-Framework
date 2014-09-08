<?php

namespace app\modules\pda\models;

use Yii;

/**
 * This is the model class for table "pda_contacts".
 *
 * @property integer $id
 * @property string $type
 * @property string $display_name
 * @property string $date_created
 * @property string $date_updated
 * @property integer $active
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pda_contacts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'display_name', 'date_created', 'active'], 'required'],
            [['type'], 'string'],
            [['date_created', 'date_updated'], 'safe'],
            [['active'], 'integer'],
            [['display_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'display_name' => 'Display Name',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
            'active' => 'Active',
        ];
    }
}
