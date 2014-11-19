<?php

namespace app\modules\ecom\models;

use Yii;

use app\modules\ecom\models\InvoiceStatus;
use app\modules\ecom\models\InvoiceItem;
use app\modules\ecom\models\InvoiceLog;
use app\modules\ecom\models\Payment;
use app\modules\ecom\models\Contact;
use app\modules\ac\models\User;

/**
 * This is the model class for table "ecom_invoices".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $invoice_number
 * @property integer $invoice_status_id
 * @property integer $billing_id
 * @property integer $shipping_id
 * @property integer $payment_id
 * @property string $date_created
 * @property string $date_updated
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
 * @property InvoiceItems[] $invoiceItems
 * @property InvoiceLogs[] $invoiceLogs
 * @property User $user
 * @property InvoiceStatus $invoiceStatus
 * @property Contact $billing_contact
 * @property Contact $shipping_contact
 * @property Payment $payment
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
            [['user_id', 'invoice_status_id', 'billing_id', 'shipping_id', 'payment_id'], 'integer'],
            [['invoice_number', 'invoice_status_id', 'billing_id', 'shipping_id', 'date_created', 'date_due', 'subtotal', 'shipping', 'credit', 'tax', 'tax_rate', 'total', 'token'], 'required'],
            [['invoice_number', 'details'], 'string'],
            [['date_created', 'date_updated', 'date_due', 'date_paid'], 'safe'],
            [['subtotal', 'shipping', 'credit', 'tax', 'tax_rate', 'total'], 'number'],
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
            'user_id' => 'User ID',
            'invoice_number' => 'Invoice Number',
            'invoice_status_id' => 'Invoice Status ID',
            'billing_id' => 'Billing ID',
            'shipping_id' => 'Shipping ID',
            'payment_id' => 'Payment ID',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
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
    public function getInvoiceLogs()
    {
        return $this->hasMany(InvoiceLog::className(), ['invoice_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceStatus()
    {
        return $this->hasOne(InvoiceStatus::className(), ['id' => 'invoice_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBillingContact()
    {
        return $this->hasOne(Contact::className(), ['id' => 'billing_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShippingContact()
    {
        return $this->hasOne(Contact::className(), ['id' => 'shipping_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayment()
    {
        return $this->hasOne(Payment::className(), ['id' => 'payment_id']);
    }
}
