<?php

namespace app\modules\ecom\models;

use Yii;

use app\modules\ecom\models\Contact;
use app\modules\ecom\models\Invoice;
use app\modules\ecom\models\PaymentType;
use app\modules\ecom\models\PaymentMethod;
use app\modules\ac\models\User;


/**
 * This is the model class for table "ecom_payments".
 *
 * @property integer $id
 * @property integer $payment_type_id
 * @property integer $user_id
 * @property integer $billing_id
 * @property string $date_created
 * @property string $amount
 * @property integer $payment_method_id
 * @property string $account_type
 * @property string $account_number
 * @property string $transaction_id
 * @property string $auth_code
 * @property string $token
 * @property string $comments
 * @property string $details
 *
 * @property Invoice $invoice
 * @property PaymentType $paymentType
 * @property User $user
 * @property PaymentMethod $paymentMethod
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
            [['payment_type_id', 'user_id', 'payment_method_id', 'billing_id'], 'integer'],
            [['date_created', 'token'], 'safe'],
            [['amount'], 'number'],
            [['comments', 'details'], 'string'],
			['auth_code', 'string', 'max' => 50],
            [['account_type', 'account_number'], 'string', 'max' => 100],
            [['transaction_id', 'token'], 'string', 'max' => 128],
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
            'payment_type_id' => 'Payment Type ID',
            'user_id' => 'User ID',
			'billing_id' => 'Billing ID',
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
	
	public function beforeSave($insert)
	{
		if (parent::beforeSave($insert)) {
			$this->token = \Yii::$app->security->generateRandomString();
			return true;
		} else {
			return false;
		}
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(Invoice::className(), ['payment_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentType()
    {
        return $this->hasOne(PaymentType::className(), ['id' => 'payment_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
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
    public function getPaymentMethod()
    {
        return $this->hasOne(PaymentMethod::className(), ['id' => 'payment_method_id']);
    }
}
