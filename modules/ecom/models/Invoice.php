<?php

namespace app\modules\ecom\models;

use Yii;
use app\modules\ecom\models\InvoiceItem;

/**
 * This is the model class for table "ecom_invoices".
 *
 * @property integer $id
 * @property string $invoice_number
 * @property integer $invoice_status_id
 * @property integer $customer_id
 * @property integer $shipping_id
 * @property integer $payment_id
 * @property string $date_created
 * @property string $date_due
 * @property string $date_paid
 * @property string $subtotal
 * @property string $shipping
 * @property string $credit
 * @property string $tax
 * @property string $tax_rate
 * @property string $total
 * @property string $token
 * @property string $details
 *
 * @property EcomInvoiceItems[] $ecomInvoiceItems
 * @property EcomShippingAddresses $shipping0
 * @property EcomInvoiceStatuses $invoiceStatus
 * @property EcomPayments $payment
 * @property EcomCustomers $customer
 * @property EcomOrders[] $ecomOrders
 */
class Invoice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_invoices';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invoice_number', 'details'], 'string'],
            [['invoice_status_id', 'customer_id', 'shipping_id', 'payment_id'], 'integer'],
            [['date_created', 'date_due', 'date_paid'], 'safe'],
            [['subtotal', 'shipping', 'credit', 'tax', 'tax_rate', 'total'], 'number'],
            [['token'], 'required'],
            [['token'], 'string', 'max' => 128],
            [['token'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'invoice_number' => 'Invoice Number',
            'invoice_status_id' => 'Invoice Status ID',
            'customer_id' => 'Customer ID',
            'shipping_id' => 'Shipping ID',
            'payment_id' => 'Payment ID',
            'date_created' => 'Date Created',
            'date_due' => 'Date Due',
            'date_paid' => 'Date Paid',
            'subtotal' => 'Subtotal',
            'shipping' => 'Shipping',
            'credit' => 'Credit',
            'tax' => 'Tax',
            'tax_rate' => 'Tax Rate',
            'total' => 'Total',
            'token' => 'Token',
            'details' => 'Details',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceItems()
    {
        return $this->hasMany(InvoiceItem::className(), ['invoice_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShipping()
    {
        return $this->hasOne(EcomShippingAddresses::className(), ['id' => 'shipping_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceStatus()
    {
        return $this->hasOne(EcomInvoiceStatuses::className(), ['id' => 'invoice_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayment()
    {
        return $this->hasOne(EcomPayments::className(), ['id' => 'payment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(EcomCustomers::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEcomOrders()
    {
        return $this->hasMany(EcomOrders::className(), ['invoice_id' => 'id']);
    }
	
	public function addLineItem($pid, $name, $qty, $price, $total, $taxed, $description, $details = NULL)
	{
		$invoiceItem = new InvoiceItem;
		
		$iItem = InvoiceItem::find()
			->where(['invoice_id' => $this->id, 'product_id' => $pid])
			->one();
		
		if($iItem) {
			$iItem->quantity += $qty;
			
			if($iItem->save()) {
				return TRUE;
			}
			
		}else{

			$invoiceItem->invoice_id = $this->id;
			$invoiceItem->product_id = $pid;
			$invoiceItem->name = $name;
			$invoiceItem->quantity = $qty;
			$invoiceItem->unit_price = $price;
			$invoiceItem->total = $total;
			$invoiceItem->taxed = $taxed;
			$invoiceItem->description = $description;
			$invoiceItem->details = $details;
			
			if($invoiceItem->save()) {
				return TRUE;
			}
			
		}
		
		return FALSE;
		
	}
}
