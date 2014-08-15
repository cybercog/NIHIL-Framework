<?php

namespace app\modules\ecom\models;

use Yii;

/**
 * This is the model class for table "ecom_products".
 *
 * @property integer $id
 * @property integer $visible
 * @property string $sku
 * @property integer $manufacturer_id
 * @property string $name
 * @property string $image
 * @property string $cost
 * @property string $price
 * @property string $description
 * @property string $details
 * @property integer $sold
 *
 * @property EcomInvoiceItems[] $ecomInvoiceItems
 * @property EcomOrderItems[] $ecomOrderItems
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['visible', 'manufacturer_id', 'sold'], 'integer'],
            [['sku', 'description', 'details'], 'string'],
            [['cost', 'price'], 'number'],
            [['name'], 'string', 'max' => 100],
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
            'visible' => 'Visible',
            'sku' => 'Sku',
            'manufacturer_id' => 'Manufacturer ID',
            'name' => 'Name',
            'image' => 'Image',
            'cost' => 'Cost',
            'price' => 'Price',
            'description' => 'Description',
            'details' => 'Details',
            'sold' => 'Sold',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEcomInvoiceItems()
    {
        return $this->hasMany(EcomInvoiceItems::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEcomOrderItems()
    {
        return $this->hasMany(EcomOrderItems::className(), ['product_id' => 'id']);
    }
	
	/**
     * Finds by slug
     *
     * @param  int      $limit
     * @return static|null
     */
    public static function findBySlug($slug)
    {
		return static::findOne(['slug' => $slug]);
    }
}
