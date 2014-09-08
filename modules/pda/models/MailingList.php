<?php

namespace app\modules\pda\models;

use Yii;

/**
 * This is the model class for table "pda_mailing_lists".
 *
 * @property integer $id
 * @property integer $owner
 * @property string $name
 * @property string $description
 * @property integer $number_members
 */
class MailingList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pda_mailing_lists';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['owner', 'name', 'description', 'number_members'], 'required'],
            [['owner', 'number_members'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'owner' => 'Owner',
            'name' => 'Name',
            'description' => 'Description',
            'number_members' => 'Number Members',
        ];
    }
}
