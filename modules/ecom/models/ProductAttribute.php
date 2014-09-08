<?php

namespace app\modules\ecom\models;

use Yii;

/**
 * This is the model class for table "ecom_product_attributes".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $attribute_id
 * @property integer $stock
 * @property string $additional_cost
 * @property string $additional_price
 * @property string $date_inventoried
 * @property integer $user_inventoried
 * @property string $shipping_weight
 * @property string $shipping_width
 * @property string $shipping_length
 * @property string $shipping_height
 * @property string $shipping_volume
 * @property string $date_last_sale
 * @property integer $sold
 * @property string $details
 */
class ProductAttribute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_product_attributes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'attribute_id', 'stock', 'user_inventoried', 'sold'], 'integer'],
            [['additional_cost', 'additional_price', 'shipping_weight', 'shipping_width', 'shipping_length', 'shipping_height', 'shipping_volume'], 'number'],
            [['date_inventoried', 'date_last_sale'], 'safe'],
            [['details'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'attribute_id' => 'Attribute ID',
            'stock' => 'Stock',
            'additional_cost' => 'Additional Cost',
            'additional_price' => 'Additional Price',
            'date_inventoried' => 'Date Inventoried',
            'user_inventoried' => 'User Inventoried',
            'shipping_weight' => 'Shipping Weight',
            'shipping_width' => 'Shipping Width',
            'shipping_length' => 'Shipping Length',
            'shipping_height' => 'Shipping Height',
            'shipping_volume' => 'Shipping Volume',
            'date_last_sale' => 'Date Last Sale',
            'sold' => 'Sold',
            'details' => 'Details',
        ];
    }
	
	public function getProductAttribute($id)
	{
		return static::findOne(['id' => $id]);
	}
	
	public function getAllForProduct($pid)
	{
		return ProductAttribute::find()->where(['product_id' => $pid])->all();
	}
}
