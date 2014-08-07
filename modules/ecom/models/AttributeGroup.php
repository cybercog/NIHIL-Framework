<?php

namespace app\modules\ecom\models;

use Yii;

/**
 * This is the model class for table "ecom_attribute_groups".
 *
 * @property integer $id
 * @property integer $parent
 * @property string $name
 * @property string $decription
 *
 * @property AttributeGroup $parent0
 * @property AttributeGroup[] $attributeGroups
 * @property EcomAttributes[] $ecomAttributes
 */
class AttributeGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_attribute_groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent'], 'integer'],
            [['decription'], 'string'],
            [['name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent' => 'Parent',
            'name' => 'Name',
            'decription' => 'Decription',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(AttributeGroup::className(), ['id' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributeGroups()
    {
        return $this->hasMany(AttributeGroup::className(), ['parent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEcomAttributes()
    {
        return $this->hasMany(EcomAttributes::className(), ['group_id' => 'id']);
    }
}
