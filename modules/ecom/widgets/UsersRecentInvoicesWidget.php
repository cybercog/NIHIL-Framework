<?php
namespace app\modules\ecom\widgets;

use yii\base\Widget;
use yii\helpers\Html;

use app\modules\ecom\models\Customer;
use app\modules\ecom\models\Invoice;
use app\modules\ecom\models\Payment;

class UsersRecentInvoicesWidget extends Widget
{
	protected $customer;
	protected $invoices;

    public function init()
    {
		if($this->customer = Customer::find()->where(['user_id' => \Yii::$app->user->identity->getUserID()])->one()){
			$this->invoices = Invoice::find()->where(['customer_id' => $this->customer->id])->all();
		}
		parent::init();
    }
	
	public function run()
    {
		$ret = '<div class="table-responsive">
						  <table class="table">
							<thead>
								<tr>
									<th colspan="2"><h2>Recent Activity</h2></th>
								</tr>
							</thead>
							<tbody>';
								
        if(count($this->invoices) > 0) {
			
			$ret .= '<tr>
									<th>Date</th>
									<th>Invoice Number</th>
									<th>Description</th>
									<th>Total</th>
									<th>&nbsp;</th>
								</tr>';
			
			foreach($this->invoices as $invoice) {
			
				$ret .= '<tr><td>' . $invoice->date_paid . '</td><td>' . $invoice->invoice_number . '</td>';
				
				$payment = Payment::find()->where(['id' => $invoice->payment_id])->one();
				
				if($payment->payment_type_id == 2) {
					$ret .= '<td>Thank you for your donation.</td>';
				}elseif($payment->payment_type_id == 1){
					$ret .= '<td>You purchased some merchandise.</td>';
				}else{
					$ret .= '<td>You did something special.</td>';
				}
				
				$ret .= '<td>' . $invoice->total . '</td><td><a href="/invoices/view/' . $invoice->token . '">view</a> | <a href="/invoice/print/' . $invoice->token . '">print</a></td></tr>';
			}
			
		}else{
			$ret .= '<tr><td>No recent activity.</td></tr>';
		}
		
		$ret .= '</tbody>
						  </table>
						</div>';
						
		return $ret;
    }
	
}