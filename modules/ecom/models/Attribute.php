<?php

namespace app\modules\ecom\models;

use Yii;

/**
 * This is the model class for table "ecom_attributes".
 *
 * @property integer $id
 * @property string $sku
 * @property integer $group_id
 * @property string $name
 * @property string $cost
 * @property string $price
 * @property string $weight
 * @property string $size
 * @property string $description
 *
 * @property EcomAttributeGroups $group
 */
class Attribute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_attributes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sku', 'description'], 'string'],
            [['group_id'], 'integer'],
            [['cost', 'price', 'weight'], 'number'],
            [['name', 'size'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sku' => 'Sku',
            'group_id' => 'Group ID',
            'name' => 'Name',
            'cost' => 'Cost',
            'price' => 'Price',
            'weight' => 'Weight',
            'size' => 'Size',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(EcomAttributeGroups::className(), ['id' => 'group_id']);
    }
}
