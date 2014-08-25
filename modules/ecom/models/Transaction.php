<?php

namespace app\modules\ecom\models;

use Yii;

/**
 * This is the model class for table "ecom_transactions".
 *
 * @property integer $id
 * @property string $transaction_id
 * @property string $ip_address
 * @property string $timestamp
 * @property string $data_sent
 * @property string $data_received
 * @property string $details
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_transactions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['timestamp'], 'safe'],
            [['data_sent', 'data_received', 'details'], 'string'],
            [['transaction_id', 'ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
			'transaction_id' => 'Transaction ID:',
            'ip_address' => 'Ip Address',
            'timestamp' => 'Timestamp',
            'data_sent' => 'Data Sent',
            'data_received' => 'Data Received',
            'details' => 'Details',
        ];
    }
	
	public function getTransactionToken()
	{
		$uData = unserialize($this->data_received);
		return $uData->transaction_tag;
	}
}
