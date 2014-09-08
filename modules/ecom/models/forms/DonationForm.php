<?php

namespace app\modules\ecom\models\forms;

use Yii;
use yii\base\Model;

use app\modules\ecom\models\Payment;
use app\modules\ecom\models\Invoice;
use app\modules\ecom\models\Customer;
use app\modules\ecom\models\Product;
use app\modules\ecom\models\Transaction;
use app\modules\ecom\components\FirstData;

/**
 * DonateForm is the model behind the donate form.
 */
class DonationForm extends Model {

    public $amount;
	public $recurrence = 'once'; //once, monthly, annual
    public $first_name;
    public $last_name;
	public $card_number;
	public $card_exp_month;
	public $card_exp_year;
	public $card_cvv2;
	public $email;
	public $phone;
	public $address1;
	public $address2;
	public $city;
	public $state;
	public $postal_code;
	public $comments;

    /**
     * @var \amnah\yii2\user\models\User
     */
    protected $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [["amount", "recurrence", "first_name", "last_name", "card_number", "card_exp_month", "card_exp_year", "card_cvv2", "email", "address1", "city", "state", "postal_code"], "required"],
            ["card_number", "validateCardNumber"],
            ["email", "email"],
			["amount", "match", 'pattern'=>'/^[0-9]{1,9}(\.[0-9]{0,2})?$/'],
			[["phone", "address2", "comments"], "safe"],
        ];
    }
	
	/**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'amount' => 'Amount',
            'card_number' => 'Card Number',
			'card_exp_month' => 'Month',
			'card_exp_year' => 'Year',
			'card_cvv2' => 'CVV2',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
        ];
    }
	
	public function validateCardNumber() {
	
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
	
	public function statesDropdown() {
		return array(
			'AL'=>"AL", 
			'AK'=>"AK", 
			'AZ'=>"AZ", 
			'AR'=>"AR", 
			'CA'=>"CA", 
			'CO'=>"CO", 
			'CT'=>"CT", 
			'DE'=>"DE", 
			'DC'=>"DC", 
			'FL'=>"FL", 
			'GA'=>"GA", 
			'HI'=>"HI", 
			'ID'=>"ID", 
			'IL'=>"IL", 
			'IN'=>"IN", 
			'IA'=>"IA", 
			'KS'=>"KS", 
			'KY'=>"KY", 
			'LA'=>"LA", 
			'ME'=>"ME", 
			'MD'=>"MD", 
			'MA'=>"MA", 
			'MI'=>"MI", 
			'MN'=>"MN", 
			'MS'=>"MS", 
			'MO'=>"MO", 
			'MT'=>"MT",
			'NE'=>"NE",
			'NV'=>"NV",
			'NH'=>"NH",
			'NJ'=>"NJ",
			'NM'=>"NM",
			'NY'=>"NY",
			'NC'=>"NC",
			'ND'=>"ND",
			'OH'=>"OH", 
			'OK'=>"OK", 
			'OR'=>"OR", 
			'PA'=>"PA", 
			'RI'=>"RI", 
			'SC'=>"SC", 
			'SD'=>"SD",
			'TN'=>"TN", 
			'TX'=>"TX", 
			'UT'=>"UT", 
			'VT'=>"VT", 
			'VA'=>"VA", 
			'WA'=>"WA", 
			'WV'=>"WV", 
			'WI'=>"WI", 
			'WY'=>"WY"
		);
	}
	
	
	
	
	public function fdAuthorizeDonation()
	{
		// validate form
		if ($this->validate()) {
		
			// get customer
			$customer = $this->whoIsThisCustomer();
			
			// check for recent payment authorization by customer for similar amount
			if(!$payment = $this->getFDPreAuth($customer->id)) {
				return FALSE;
			}
			
			// check for invoice
			$invoice = $this->getAuthorizedInvoice($customer->id, $payment);
			
			return $invoice->token;
		}
		
		// invalid form
		return FALSE;
		
		
		
		// check for previous payment authorization in last 30 days by customer for same amount
		// if previous, get invoice
			// if not invoice, generate invoice
		// else send authnet, log authnet, create payment, and generate invoice
		// return confirm payment token
	}
	
	public function getFDPreAuth($cid)
	{
		//
		if(!$cid) { return FALSE; }
		
		$payment = Payment::find()
			->where([
				'payment_type_id' => 5, // 5 = Authorization
				'customer_id' => $cid,
				'account_number' => 'XXXX' . substr($this->card_number, -4),
				'amount' => $this->amount,
			])
			->andWhere('date_created > :threshold', [':threshold' => date('Y-m-d H:i:s', time() - (30 * 24 * 60 * 60))])
			->one();
		
		if(!$payment) {
		
			//authorize payment
			$t = time();
			if(!$data = $this->fdAuthorizePayment($cid, $t)) {
				return FALSE;
			}
			
			//die(print_r($data->getArrayResponse()));
			
			$payment = new Payment;
			
			$payment->customer_id = $cid;
			$payment->payment_type_id = 5;
			$payment->amount = $this->amount;
			$payment->date_created = date('Y-m-d H:i:s', $t);
			$payment->payment_method_id = 5;
			$payment->account_type = $data->getCreditCardType();
			$payment->account_number = $data->getCreditCardNumber();
			$payment->transaction_id = $data->getAuthNumber();
			$payment->token = MD5( date('Y-m-d H:i:s', $t) . $data->getAuthNumber());
			$payment->comments = $this->comments;
			
			if(!$payment->save()) {
				return FALSE;
			}
		
		}
		
		return $payment;
	}
	
	public function fdAuthorizePayment($cid = NULL, $tstamp = NULL)
	{
		//
		$firstData = new FirstData;
		
		if(!$tstamp) { $tstamp = time(); }
		$ts = date('YmdGis', $tstamp);
		
		$addr = explode(' ', $this->address1);
		
		$firstData->setCreditCardNumber($this->card_number)
				  ->setCreditCardName($this->first_name . ' ' . $this->last_name)
				  ->setCreditCardExpiration(str_pad($this->card_exp_month, 2, '0', STR_PAD_LEFT) . $this->card_exp_year)
				  ->setAmount($this->amount)
				  ->setCreditCardVerification($this->card_cvv2)
				  ->setCreditCardAddress($addr[0])
				  ->setCreditCardZipCode($this->postal_code)
				  ->setReferenceNumber($cid) // set to ref num
				  ->setCustomerReferenceNumber($cid);

		$firstData->setTransactionType($firstData::TRAN_PREAUTH);
		$firstData->process();
		
		if(!$this->saveTransaction($firstData)) {
			die("Could NOT save transaction details.");
		}

		// Check
		if($firstData->isError()) {
			// there was an error
			//die("FirstData processing error." . print_r($firstData));
			
			// Errors
			if($firstData->getErrorCode() == 22) {
				// Duplicate Error
				$this->addError('card_number', 'Invalid card number.');
			}elseif($firstData->getErrorCode() == 63) {
				// Duplicate Error
				$this->addError('card_number', 'Duplicate transaction.');
			}elseif($firstData->getBankResponseCode() == 605) {
				// Bad Exp Date
				$this->addError('card_exp_month', 'Bad month.');
				$this->addError('card_exp_year', 'Bad year.');
			}else{
				// Unknown Error
				die(print_r($firstData));
				$this->addError('card_number', 'Unknown Processing Error.');
			}
			
		}elseif($firstData->isApproved()){
			// transaction passed
			//die(print_r($firstData->getTransactionRecord()));
			//die(print_r($firstData->getArrayResponse()));
			
			return $firstData;
		}else{
			//
			die("Processing Error");
		}
		
		return FALSE;
	}
	
	public function getAuthorizedInvoice($cid = NULL, $payment)
	{
		// todo: assign object values to variables
		if(!$cid OR !$payment) { return FALSE; }
	
		$invoice = Invoice::find()
			->where([
				'payment_id' => $payment->id,
				'customer_id' => $cid,
				'invoice_status_id' => 4,
			])
			->one();
		
		if(!$invoice) {
		
			$invoice = new Invoice;
			
			$invoice->invoice_number = 'DR-' . date('YmdGis', strtotime($payment->date_created));
			$invoice->customer_id = $cid;
			$invoice->payment_id = $payment->id;
			$invoice->invoice_status_id = 4;
			$invoice->date_created = $payment->date_created;
			$invoice->date_due = date('Y-m-d H:i:s', strtotime($payment->date_created) + (30 * 24 * 60 * 60));
			$invoice->subtotal = $payment->amount;
			$invoice->shipping = 0.00;
			$invoice->credit = 0.00;
			$invoice->tax = 0.00;
			$invoice->tax_rate = 0.00;
			$invoice->total = $payment->amount;
			$invoice->token = MD5($invoice->invoice_number . $invoice->date_created . $invoice->total);
			
			if(!$invoice->save()) {
				return FALSE;
			}
			
			// 6 is Donation
			$p = Product::find()->where(['id' => 6])->one();
			
			// 22 is Donation
			if(!$invoice->addLineItem(22, $p->name, 1, $payment->amount, $payment->amount, 0, $p->description)) {
				return FALSE;
			}
		
		}
		
		return $invoice;
	}
	
	public function whoIsThisCustomer() 
	{
		// find customer or create new customer
		$customer = Customer::find()
			->where([
				'first' => $this->first_name,
				'last' => $this->last_name,
				'email' => $this->email,
				'address1' => $this->address1,
				'city' => $this->city,
				'state' => $this->state,
				'zipcode' => $this->postal_code,
				'country' => 'US'
			])
			->one();
			
		if(!$customer) {
			$customer = new Customer;

			$customer->first = $this->first_name;
			$customer->last = $this->last_name;
			$customer->email = $this->email;
			$customer->address1 = $this->address1;
			$customer->city = $this->city;
			$customer->state = $this->state;
			$customer->zipcode = $this->postal_code;
			$customer->country = 'US';
			if(isset($this->phone) AND $this->phone != '') {
				$customer->phone = $this->phone;
			}
			if(isset($this->address2) AND $this->address2 != '') {
				$customer->address2 = $this->address2;
			}

			if(!$customer->save()) {
				//die('bad customer');
				return FALSE;
			}
		}
		
		return $customer;
	}
	
	
	public function saveTransaction($fdResponse)
	{
		$data = $this;
		$data->card_number = $fdResponse->getCreditCardNumber();
		$transaction = new Transaction;
		
		$transaction->transaction_id = $fdResponse->getAuthNumber();
		$transaction->timestamp = date('Y-m-d H:i:s');
		$transaction->data_sent = serialize($data);
		
		if($fdResponse->isApproved()) {
			$transaction->ip_address = $fdResponse->getClientIp();
			$transaction->data_received = serialize($fdResponse->getArrayResponse());
		}else{
			//die(print_r($fdResponse));
			$transaction->ip_address = \Yii::$app->request->getUserIP();
			$da = array();
			
			if($fdResponse->isError()) {
				$da[$fdResponse->getErrorCode()] = $fdResponse->getErrorMessage();
			}
			
			if($fdResponse->getBankResponseCode() != 100) {
				$da[$fdResponse->getBankResponseCode()] = $fdResponse->getBankResponseComments();
			}

			$transaction->data_received = serialize($da);
		}
		
		return $transaction->save();
	}
    
}