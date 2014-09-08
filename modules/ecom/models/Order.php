<?php

namespace app\modules\ecom\models;

use Yii;

use app\modules\ecom\models\OrderItem;

/**
 * This is the model class for table "ecom_orders".
 *
 * @property integer $id
 * @property string $order_number
 * @property integer $customer_id
 * @property integer $shipping_id
 * @property integer $invoice_id
 * @property integer $order_status_id
 * @property string $date_created
 * @property string $date_processed
 * @property string $date_shipped
 * @property string $ip_address
 * @property integer $number_items
 * @property string $details
 *
 * @property EcomOrderItems[] $ecomOrderItems
 * @property EcomOrderStatuses $orderStatus
 * @property EcomCustomers $customer
 * @property EcomShippingAddresses $shipping
 * @property EcomInvoices $invoice
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_number', 'details'], 'string'],
            [['customer_id', 'shipping_id', 'invoice_id', 'order_status_id', 'number_items'], 'integer'],
            [['date_created', 'date_processed', 'date_shipped'], 'safe'],
            [['ip_address'], 'string', 'max' => 16]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_number' => 'Order Number',
            'customer_id' => 'Customer ID',
            'shipping_id' => 'Shipping ID',
            'invoice_id' => 'Invoice ID',
            'order_status_id' => 'Order Status ID',
            'date_created' => 'Date Created',
            'date_processed' => 'Date Processed',
            'date_shipped' => 'Date Shipped',
            'ip_address' => 'Ip Address',
            'number_items' => 'Number Items',
            'details' => 'Details',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderStatus()
    {
        return $this->hasOne(OrderStatus::className(), ['id' => 'order_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShipping()
    {
        return $this->hasOne(ShippingAddress::className(), ['id' => 'shipping_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOneInvoice::className(), ['id' => 'invoice_id']);
    }
	
	public function addLineItem($paid, $qty, $description, $details = NULL)
	{
		$orderItem = new OrderItem;
		
		$oItem = OrderItem::find()
			->where(['order_id' => $this->id, 'product_attribute_id' => $paid])
			->one();
		
		if($oItem) {
			$oItem->quantity += $qty;
			
			if($oItem->save()) {
				return TRUE;
			}
			
		}else{

			$orderItem->order_id = $this->id;
			$orderItem->product_attribute_id = $paid;
			$orderItem->quantity = $qty;
			$orderItem->description = $description;
			$orderItem->details = $details;
			
			if($orderItem->save()) {
				return TRUE;
			}
			
		}
		
		return FALSE;
		
	}
}
