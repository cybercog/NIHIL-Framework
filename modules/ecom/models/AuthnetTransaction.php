<?php

namespace app\modules\ecom\models;

use Yii;

/**
 * This is the model class for table "ecom_authnet_transactions".
 *
 * @property integer $id
 * @property string $ip_address
 * @property string $timestamp
 * @property integer $response_code
 * @property string $response_text
 * @property string $authorization_type
 * @property string $result
 * @property string $transaction_id
 * @property string $data_sent
 * @property string $data_received
 * @property string $session_id
 * @property string $details
 */
class AuthnetTransaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_authnet_transactions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['timestamp'], 'safe'],
            [['response_code', 'transaction_id'], 'integer'],
            [['authorization_type', 'data_sent', 'data_received', 'details'], 'string'],
            [['ip_address'], 'string', 'max' => 64],
            [['response_text', 'result', 'session_id'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip_address' => 'Ip Address',
            'timestamp' => 'Timestamp',
            'response_code' => 'Response Code',
            'response_text' => 'Response Text',
            'authorization_type' => 'Authorization Type',
            'result' => 'Result',
            'transaction_id' => 'Transaction ID',
            'data_sent' => 'Data Sent',
            'data_received' => 'Data Received',
            'session_id' => 'Session ID',
            'details' => 'Details',
        ];
    }
}
