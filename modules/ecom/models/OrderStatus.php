<?php

namespace app\modules\ecom\models;

use Yii;

/**
 * This is the model class for table "ecom_order_statuses".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $color
 * @property integer $order
 *
 * @property EcomOrders[] $ecomOrders
 */
class OrderStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_order_statuses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['order'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['color'], 'string', 'max' => 16]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'color' => 'Color',
            'order' => 'Order',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEcomOrders()
    {
        return $this->hasMany(EcomOrders::className(), ['order_status_id' => 'id']);
    }
}
