<?php

namespace app\modules\ecom\models;

use Yii;

/**
 * This is the model class for table "ecom_invoice_logs".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $invoice_id
 * @property string $action
 * @property string $description
 * @property string $timestamp
 * @property string $ip_address
 * @property string $user_agent
 *
 * @property EcomInvoices $invoice
 */
class InvoiceLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_invoice_logs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invoice_id', 'user_id', 'action', 'timestamp', 'ip_address', 'user_agent'], 'required'],
            [['invoice_id', 'user_id'], 'integer'],
            [['description'], 'string'],
            [['timestamp'], 'safe'],
            [['action'], 'string', 'max' => 250],
            [['ip_address'], 'string', 'max' => 64],
            [['user_agent'], 'string', 'max' => 255]
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
			'invoice_id' => 'Invoice ID',
            'action' => 'Action',
            'description' => 'Description',
            'timestamp' => 'Timestamp',
            'ip_address' => 'Ip Address',
            'user_agent' => 'User Agent',
        ];
    }
	
	public function makeLog($invoice_id, $action, $description)
	{
		$this->invoice_id = $invoice_id;
		$this->user_id = \Yii::$app->user->getIdentity()->id;
		$this->action = $action;
		$this->description = $description;
		$this->timestamp = date("Y-m-d H:i:s");
		$this->ip_address = \Yii::$app->request->getUserIP();
		$this->user_agent = \Yii::$app->request->getUserAgent();
		
		//$this->save();
		//die(print_r($this));
		
		return $this->save();
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(EcomInvoices::className(), ['id' => 'invoice_id']);
    }
}
