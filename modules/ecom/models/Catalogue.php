<?php

namespace app\modules\ecom\models;

use Yii;

/**
 * This is the model class for table "ecom_catalogues".
 *
 * @property integer $id
 * @property integer $parent
 * @property string $name
 * @property string $description
 *
 * @property Catalogue $parent0
 * @property Catalogue[] $catalogues
 */
class Catalogue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_catalogues';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent'], 'integer'],
            [['description'], 'string'],
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
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(Catalogue::className(), ['id' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogues()
    {
        return $this->hasMany(Catalogue::className(), ['parent' => 'id']);
    }
}
