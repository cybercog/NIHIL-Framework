<?php

namespace app\modules\ecom\models;

use Yii;

/**
 * This is the model class for table "ecom_payments".
 *
 * @property integer $id
 * @property integer $payment_type_id
 * @property integer $customer_id
 * @property string $date_created
 * @property string $amount
 * @property integer $payment_method_id
 * @property string $account_type
 * @property string $account_number
 * @property string $transaction_id
 * @property string $token
 * @property string $comments
 * @property string $details
 *
 * @property EcomInvoices[] $ecomInvoices
 * @property EcomPaymentMethods $paymentMethod
 * @property EcomPaymentTypes $paymentType
 * @property EcomCustomers $customer
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_payments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_type_id', 'customer_id', 'payment_method_id', 'transaction_id'], 'integer'],
            [['date_created'], 'safe'],
            [['amount'], 'number'],
            [['comments', 'details'], 'string'],
            [['account_type', 'account_number'], 'string', 'max' => 100],
            [['token'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payment_type_id' => 'Payment Type ID',
            'customer_id' => 'Customer ID',
            'date_created' => 'Date Created',
            'amount' => 'Amount',
            'payment_method_id' => 'Payment Method ID',
            'account_type' => 'Account Type',
            'account_number' => 'Account Number',
            'transaction_id' => 'Transaction ID',
            'token' => 'Token',
            'comments' => 'Comments',
            'details' => 'Details',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEcomInvoices()
    {
        return $this->hasMany(EcomInvoices::className(), ['payment_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentMethod()
    {
        return $this->hasOne(EcomPaymentMethods::className(), ['id' => 'payment_method_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentType()
    {
        return $this->hasOne(EcomPaymentTypes::className(), ['id' => 'payment_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(EcomCustomers::className(), ['id' => 'customer_id']);
    }
}
