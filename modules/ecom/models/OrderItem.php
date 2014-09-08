<?php

namespace app\modules\ecom\models;

use Yii;

use app\modules\ecom\models\ProductAttribute;
use app\modules\ecom\models\Order;

/**
 * This is the model class for table "ecom_order_items".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_attribute_id
 * @property integer $quantity
 * @property string $description
 * @property string $details
 *
 * @property EcomProducts $product
 * @property EcomOrders $order
 */
class OrderItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_order_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'product_attribute_id', 'quantity'], 'integer'],
            [['description', 'details'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'product_attribute_id' => 'Product Attribute ID',
            'quantity' => 'Quantity',
            'description' => 'Description',
            'details' => 'Details',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttribute()
    {
        return $this->hasOne(ProductAttribute::className(), ['id' => 'product_attribute_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
}
