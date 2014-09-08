<?php

namespace app\modules\ecom\models\forms;

use Yii;
use yii\base\Model;

use app\modules\ecom\models\Payment;
use app\modules\ecom\models\Invoice;
use app\modules\ecom\models\Customer;
use app\modules\ecom\models\Transaction;
use app\modules\ecom\components\FirstData;

/**
 * ConfirmForm is the model behind the donate form.
 */
class ConfirmForm extends Model {

    public $token;
	
    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [["token"], "required"],
			[["token"], "string", "max" => 128],
        ];
    }
	
	/**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'token' => 'Token',
        ];
    }
	
	public function captureFDDonation()
	{
		//
		$data = $this->payInvoice();
		
		//die(print_r($data));
		
		$products = array();
		foreach($data['invoice']->invoiceItems as $item) {
			$products[$item->product_attribute_id] = $item;
		}
		
		$data['products'] = $products;
		
		if(!$this->emailReceipt($data)) {
			return FALSE;
		}
		
		return TRUE;
	}
	
	
	
	public function emailReceipt($data)
	{
		// todo: autoload variables
	
		$htmlBody = Yii::$app->controller->renderPartial('@app/modules/ecom/emails/donation/html', $data, true);
		$textBody = Yii::$app->controller->renderPartial('@app/modules/ecom/emails/donation/text', $data, true);
		
		Yii::$app->mail->compose()
			->setTo($data['customer']->email)
			->setFrom(['no-reply@taraloka.org' => 'The Taraloka Foundation'])
			->setSubject('Thank You For Your Donation')
			->setTextBody($textBody)
			->setHtmlBody($htmlBody)
			->send();
			
		return TRUE;
	}
	
	public function payInvoice()
	{
		$invoice = Invoice::find()->where(['token' => $this->token])->one();
		$payment = Payment::find()->where(['id' => $invoice->payment_id])->one();
		$transaction = Transaction::find()->where(['transaction_id' => $payment->transaction_id])->one();
		
		// check invoice_status_id is 3 "paid"
		// check payment_type is 2 "donation"
		if($invoice->invoice_status_id == 4) {
		
			if($payment->payment_type_id == 5) {
			
				//capture payment
				if(!$d = $this->capturePreAuth($payment->transaction_id, $transaction->getTransactionToken(), $payment->amount)) {
					die("Bad capture");
					return FALSE;
				}
				
				//update payment_type_id and invoice_status_id
				$invoice->invoice_status_id = 3; // Paid
				$invoice->date_paid = date('Y-m-d H:i:s');
				$payment->payment_type_id = 2; // Donation
				$pdc = $payment->date_created;
				$ptid = $payment->transaction_id;
				$payment->transaction_id = $d->getAuthNumber();
				$payment->date_created = date('Y-m-d H:i:s');
				$payment->details = 'Previously Authorized Transaction: ' . $ptid . '  on ' . $pdc;
				
				if(!$invoice->update() OR !$payment->update()) {
					return FALSE;
				}	
			
			}elseif($payment->payment_type_id == 2) {
			
				//payment is good
				//update invoice_status_id
				$invoice->invoice_status_id = 3; // Paid
				
				if(!$invoice->update()) {
					return FALSE;
				}
			
			}
		
		}
	
		if($invoice->invoice_status_id == 3 AND $payment->payment_type_id == 2) {
			$customer = Customer::find()->where(['id' => $invoice->customer_id])->one();
			return array('invoice' => $invoice, 'payment' => $payment, 'customer' => $customer);
		}
		
		return FALSE;
		
	}
	
	public function capturePreAuth($tid, $tag, $amount)
	{
		$firstData = new FirstData;
		
		$firstData->setAuthNumber($tid);
		$firstData->setAmount($amount);
		$firstData->setTransactionTag($tag);
		$firstData->setTransactionType($firstData::TRAN_TAGGEDPREAUTHCOMPLETE);
		$firstData->process();
		
		if(!$this->saveTransaction(array('transaction_id' => $tid, 'transaction_tag' => $tag, 'amount' => $amount), $firstData)) {
			die("Could NOT save transaction.");
		}
		
		if($firstData->isError()) {
			die(print_r($firstData));
		}
		
		// Check
		if($firstData->isApproved()){
			// transaction passed
			return $firstData;
		}
		
		return FALSE;

	}
	
	public function saveTransaction($data, $fdResponse)
	{
		$transaction = new Transaction;
		$transaction->transaction_id = $fdResponse->getAuthNumber();
		$transaction->ip_address = $fdResponse->getClientIp();
		$transaction->timestamp = date('Y-m-d H:i:s');
		$transaction->data_sent = serialize($data);
		$transaction->data_received = serialize($fdResponse->getArrayResponse());
		
		return $transaction->save();
	}
    
}