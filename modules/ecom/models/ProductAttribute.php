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
 * @property string $date_inventoried
 * @property integer $user_inventoried
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
            'date_inventoried' => 'Date Inventoried',
            'user_inventoried' => 'User Inventoried',
            'date_last_sale' => 'Date Last Sale',
            'sold' => 'Sold',
            'details' => 'Details',
        ];
    }
}
