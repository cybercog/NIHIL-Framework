<?php
namespace app\modules\ecom\models\forms;

use Yii;
use yii\base\Model;

use app\modules\ecom\models\Payment;
use app\modules\ecom\models\InvoiceLog;
use app\modules\ecom\components\AuthNet;

/**
 * Payment Methods Form
 */
class CreditCardForm extends Model
{
    public $cc_number;
	public $cc_cvc;
	public $cc_name;
	public $cc_exp_month;
	public $cc_exp_year;
	public $comments;
	
	private $authnet;

	public function __construct() 
	{
		$this->authnet = new AuthNet;
	}
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cc_number', 'cc_cvc', 'cc_name', 'cc_exp_month', 'cc_exp_year'], 'required'],
            [['cc_cvc', 'cc_exp_month', 'cc_exp_year'], 'integer'],
			[['cc_number', 'cc_name', 'comments'], 'string'],
        ];
    }
	
	/**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cc_name' => 'Name on Card',
			'cc_number' => 'Card Number',
			'cc_exp_month' => 'Expiration Month',
			'cc_exp_year' => 'Expiration Year',
			'cc_cvc' => 'CVC',
			'comments' => 'Comments',
        ];
    }
	
	public function save($invoice)
	{	
		if ($this->validate()) {
			
			$response = $this->authCapture($invoice);
			
			if($response->approved) {
				// log transaction
			
				// create payment
				$payment = $this->createPayment($invoice, $response);
				
				// update invoice
				$invoice->payment_id = $payment->id;
				$invoice->invoice_status_id = 3; // Paid
				$invoice->date_paid = $payment->date_created;
				
				// update invoice log
				$invoiceLog = new InvoiceLog;
				$invoiceLog->makeLog($invoice->id, 'Invoice Paid', $invoice->billingContact->first . ' ' . $invoice->billingContact->last . ' paid $'. $response->amount . ' (Payment ID: ' . $payment->id . ') with credit card ' . $payment->account_type . ' #' . $payment->account_number . '.');
				
				if($invoice->save()) {
					Yii::$app->session->setFlash('success', 'Payment successful - check your email for a receipt.');
					return TRUE;
				}else{
					Yii::$app->session->setFlash('danger', 'Could not sync payment with invoice.');
				}
			
				
			}
			
		}
		
		return FALSE;
	}
	
	public function createPayment($invoice, $response)
	{
		$payment = new Payment;
		
		$payment->payment_type_id = 1; // Payment
		$payment->user_id = \Yii::$app->user->getIdentity()->id;
		$payment->billing_id = $invoice->billing_id;
		$payment->date_created = date("Y-m-d H:i:s");
		$payment->amount = $response->amount;
		$payment->payment_method_id = 5; // Authorize.net
		$payment->account_type = $response->card_type;
		$payment->account_number = $response->account_number;
		$payment->transaction_id = $response->transaction_id;
		$payment->auth_code = $response->authorization_code;
		if($this->comments) {
			$payment->comments = $this->comments;
		}
		
		if($payment->save()) {
			return $payment;
		}else{
			return FALSE;
		}
		
	}
	
	public function authCapture($invoice)
	{
		// Payment Details
		$this->authnet->aim->amount   = $invoice->total;
		$this->authnet->aim->card_num = $this->cc_number;
		$this->authnet->aim->exp_date = $this->cc_exp_month . '/' . $this->cc_exp_year;
		$this->authnet->aim->description = 'Payment for Invoice ' . $invoice->invoice_number;
		$this->authnet->aim->customer_ip = \Yii::$app->request->getUserIP();
		$this->authnet->aim->invoice_num = $invoice->invoice_number;
		
		// Billing Details
		$this->authnet->aim->cust_id = '1';
		$this->authnet->aim->first_name = $invoice->billingContact->first;
		$this->authnet->aim->last_name = $invoice->billingContact->last;
		$this->authnet->aim->email = $invoice->billingContact->email;
		if($invoice->billingContact->company) {
			$this->authnet->aim->company = $invoice->billingContact->company;
		}
		$this->authnet->aim->address = $invoice->billingContact->address1;
		if($invoice->billingContact->address2) {
			$this->authnet->aim->address .= ', ' . $invoice->billingContact->address2;
		}
		$this->authnet->aim->city = $invoice->billingContact->city;
		$this->authnet->aim->state = $invoice->billingContact->state;
		$this->authnet->aim->zip = $invoice->billingContact->zipcode;
		$this->authnet->aim->country = $invoice->billingContact->country;
		$this->authnet->aim->phone = $invoice->billingContact->phone;
		
		// Shipping Details
		$this->authnet->aim->ship_to_first_name = $invoice->shippingContact->first;
		$this->authnet->aim->ship_to_last_name = $invoice->shippingContact->last;
		if($invoice->shippingContact->company) {
			$this->authnet->aim->ship_to_company = $invoice->shippingContact->company;
		}
		$this->authnet->aim->ship_to_address = $invoice->shippingContact->address1;
		if($invoice->shippingContact->address2) {
			$this->authnet->aim->ship_to_address .= ', ' . $invoice->shippingContact->address2;
		}
		$this->authnet->aim->ship_to_city = $invoice->shippingContact->city;
		$this->authnet->aim->ship_to_state = $invoice->shippingContact->state;
		$this->authnet->aim->ship_to_zip = $invoice->shippingContact->zipcode;
		$this->authnet->aim->ship_to_country = $invoice->shippingContact->country;
		
		// Additional Details
		$this->authnet->aim->tax = $invoice->tax;
		$this->authnet->aim->freight = $invoice->shipping;
		$this->authnet->aim->duty = '0.00';
		if($invoice->tax_rate > 0) {
			$this->authnet->aim->tax_exempt = 'No';
		}else{
			$this->authnet->aim->tax_exempt = 'Yes';
		}
		
		$this->authnet->aim->po_num = 'PO-' . time();
		
		// Comments
		if($this->comments) {
			$this->authnet->aim->setCustomField('comments', $this->comments);
		}
		
		$response = $this->authnet->aim->authorizeAndCapture();
		
		if($response->approved) {
			Yii::$app->session->setFlash('success', 'Authorization successful.');
			//die(print_r($response));
		}else{
			$this->processError($response);
		}
		
		return $response;

	}
	
	public function processError($response)
	{
		$response_code = $response->response_code;
		$response_subcode = $response->response_subcode;
		$response_reason_code = $response->response_reason_code;
		$response_reason_text = $response->response_reason_text;
		
		$message = 'Error processing card.';
		
		if($response_code == 2) {
			
			if($response_reason_code == 3) {
				$this->addError('cc_number', 'Card declined.');
				$message = 'This transaction has been declined.';
			}elseif($response_reason_code == 4) {
				$this->addError('cc_number', 'Card declined.');
				$message = 'Your card needs to be picked-up.';
			}elseif($response_reason_code == 28) {
				$this->addError('cc_number', 'Card type not accepted.');
				$message = 'We do not accept this type of credit card.';
			}elseif($response_reason_code == 37) {
				$this->addError('cc_number', 'Invalid card number.');
				$message = 'Card number invalid.';
			}elseif($response_reason_code == 44 OR $response_reason_code == 65 ) {
				$this->addError('cc_cvc', 'CVC mismatch.');
				$this->addError('cc_number', 'CVC does not match card.');
				$message = 'Card number invalid.';
			}else {
				$message = 'This transaction has been declined.';
			}
			
		}elseif($response_code == 3) {
		
			if($response_reason_code == 5) {
				$message = 'A payment amount is required.';
			}elseif($response_reason_code == 6) {
				$this->addError('cc_number', 'Invalid card number.');
				$message = 'Card number invalid.';
			}elseif($response_reason_code == 7) {
				$this->addError('cc_exp_month', 'Invalid month.');
				$this->addError('cc_exp_year', 'Invalid year.');
				$message = 'Invalid expiration date.';
			}elseif($response_reason_code == 8) {
				$this->addError('cc_number', 'Card has expired.');
				$this->addError('cc_exp_month', 'Card has expired.');
				$this->addError('cc_exp_year', 'Card has expired.');
				$message = 'Your card has expired.';
			}elseif($response_reason_code == 11) {
				$this->addError('cc_number', 'Duplicate transaction.');
				$message = 'Duplicate - there is a similar previous transaction.';
			}elseif($response_reason_code == 17) {
				$this->addError('cc_number', 'Card type not accepted.');
				$message = 'The merchant does not accept this type of credit card.';
			}elseif($response_reason_code >= 19 AND $response_reason_code <= 23) {
				$message = 'An error occurred while processing.  Please wait 5 minutes and try again.';
			}else {
				$message = 'There was an error processing this transaction.';
			}
			
		}elseif($response_code == 4) {
		
			$message = 'Payment held for review.';
			
		}else{
		
			$message = 'Unknown processing error.';
			
		}
		
		Yii::$app->session->setFlash('danger', $message);

	}

    public function getRadioList()
	{
		return array(
			'2' => '<i class="fa fa-3x fa-credit-card"></i><br />Credit Card',
			'3' => '<i class="fa fa-3x fa-university"></i><br />Check',
			'4' => '<i class="fa fa-3x fa-btc"></i><br />Bitcoin',
			'6' => '<i class="fa fa-3x fa-paypal"></i><br />PayPal',
			'8' => '<i class="fa fa-3x fa-google-wallet"></i><br />Google',
		);
	}
	
	public function monthsDropdown() {
		return array(
			'1' => '01',
			'2' => '02',
			'3' => '03',
			'4' => '04',
			'5' => '05',
			'6' => '06',
			'7' => '07',
			'8' => '08',
			'9' => '09',
			'10' => '10',
			'11' => '11',
			'12' => '12',
		);
	}
	
	public function yearsDropdown() {
		$ret = array();
		for($i = date('y'); $i <= (date('y') + 15); $i++) {
			$ret[$i] = '20' . $i;
		}
		return $ret;
	}
	
}