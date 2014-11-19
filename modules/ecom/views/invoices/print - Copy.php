<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\Invoice */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - Print: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Invoices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$statusLabels = array(
	'1' => '<span class="label label-success invoice-label">New</span>',
	'2' => '<span class="label label-warning invoice-label">Overdue</span>',
	'3' => '<span class="label label-danger invoice-label">Paid</span>',
	'4' => '<span class="label label-info invoice-label">Authorized</span>',
	'5' => '<span class="label label-info invoice-label">Pledged</span>',
	'6' => '<span class="label label-default invoice-label">Expired</span>',
	'7' => '<span class="label label-primary invoice-label">Needs Revision</span>',
);
?>

	  <section id="ecom-invoice-view">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				
				<div class="row">
				  <div class="col-xs-12">
				  
				    <div class="row">
					  <div class="col-xs-6">
				        <h2>NIHIL</h2>
				      </div>
					  <div class="col-xs-6 text-right">
				        <h2>INVOICE</h2>
				      </div>
				    </div>
					
					<div class="row">
					  <div class="col-xs-4">
				        The NIHIL Corporation
				      </div>
					  <div class="col-xs-3 col-xs-offset-5 text-right">
				        Date: <?php echo date("m/d/Y", strtotime($model->date_created)); ?>
				      </div>
				    </div>
					<div class="row">
					  <div class="col-xs-4">
				        6409 Sail Pointe Lane
				      </div>
					  <div class="col-xs-3 col-xs-offset-5 text-right">
				        Invoice #: <?php echo $model->invoice_number; ?>
				      </div>
				    </div>
					<div class="row">
					  <div class="col-xs-4">
				        Hixson, TN 37343
				      </div>
					  <div class="col-xs-3 col-xs-offset-5 text-right">
				        <!-- spacer -->&nbsp;
				      </div>
				    </div>
					<div class="row">
					  <div class="col-xs-4">
				        <a href="tel:14232905391">(423) 290-5391</a><br />
						<a href="mailto:billing@nihil.co">billing@nihil.co</a>
				      </div>
					  <div class="col-xs-3 col-xs-offset-5 text-right">
				        <?php echo $statusLabels[$model->invoice_status_id]; ?>
				      </div>
				    </div>
					
					<div class="row">
					  <div class="col-xs-4">
				        <h4>Billing Address:</h4>
				      </div>
					  <div class="col-xs-4">
				        <h4>Shipping Address:</h4>
				      </div>
				    </div>
					<div class="row">
					  <div class="col-xs-4">
				        <?php echo $model->billingContact->first . ' ' . $model->billingContact->last; ?>
				      </div>
					  <div class="col-xs-4">
				        <?php echo $model->shippingContact->first . ' ' . $model->shippingContact->last; ?>
				      </div>
				    </div>
					<div class="row">
					  <div class="col-xs-4">
				        <?php echo $model->billingContact->company; ?>
				      </div>
					  <div class="col-xs-4">
				        <?php echo $model->shippingContact->company; ?>
				      </div>
				    </div>
					<div class="row">
					  <div class="col-xs-4">
				        <?php echo $model->billingContact->address1; ?>
				      </div>
					  <div class="col-xs-4">
				        <?php echo $model->shippingContact->address1; ?>
				      </div>
				    </div>
					<div class="row">
					  <div class="col-xs-4">
				        <?php echo $model->billingContact->address2; ?>
				      </div>
					  <div class="col-xs-4">
				        <?php echo $model->shippingContact->address2; ?>
				      </div>
				    </div>
					<div class="row">
					  <div class="col-xs-4">
				        <?php echo $model->billingContact->city; ?>, <?php echo $model->billingContact->state; ?> <?php echo $model->billingContact->zipcode; ?>, <?php echo $model->billingContact->country; ?>
				      </div>
					  <div class="col-xs-4">
				        <?php echo $model->shippingContact->city; ?>, <?php echo $model->shippingContact->state; ?> <?php echo $model->shippingContact->zipcode; ?>, <?php echo $model->shippingContact->country; ?>
				      </div>
				    </div>
					<div class="row">
					  <div class="col-xs-4">
				        <?php echo $model->billingContact->phone; ?>
				      </div>
					  <div class="col-xs-4">
				        <?php echo $model->shippingContact->phone; ?>
				      </div>
				    </div>
					<div class="row">
					  <div class="col-xs-4">
				        <?php echo $model->billingContact->email; ?>
				      </div>
					  <div class="col-xs-4">
				        <?php echo $model->shippingContact->email; ?>
				      </div>
				    </div>
					
					<div class="row">
					  <div class="col-xs-12">
				        <h4>Itemized Breakdown:</h4>
				      </div>
				    </div>
					
					<div class="row">
					  <div class="col-xs-12">
				        <table class="table table-bordered invoice-table">
						  <thead>
						    <tr>
							  <th class="invoice-table-qty">Qty</th>
							  <th class="invoice-table-name">Name</th>
							  <th class="invoice-table-price">Price</th>
							  <th class="invoice-table-subtotal">Subtotal</th>
							</tr>
						  </thead>
						  <tbody>
							<?php
							  foreach($model->invoiceItems as $invoiceItem) {
							    echo '<tr><td class="invoice-table-qty">' . $invoiceItem->quantity . '</td><td class="invoice-table-name"><strong>' . $invoiceItem->name . '</strong><br />' . $invoiceItem->description . '</td><td class="invoice-table-price">$' . $invoiceItem->unit_price . '</td><td class="invoice-table-subtotal">$' . $invoiceItem->total . '</td></tr>';
							  }
							?>
						  </tbody>
						  <tfoot>
						    <tr>
							  <td colspan="2" rowspan="5">
							    <h5>Other Comments</h5>
								<ol>
								  <li>Total payment due in 30 days.</li>
								  <li>Please include the invoice number on your check.</li>
								  <li>Keep this invoice for your records.</li>
								</ol>
							  </td>
							  <th class="text-right">Subtotal</th>
							  <td class="invoice-table-subtotal">$<?php echo $model->subtotal ?></td>
							</tr>
							<tr>
							  <th class="text-right">Tax Rate</th>
							  <td class="invoice-table-subtotal">0.00%</td>
							</tr>
							<tr>
							  <th class="text-right">Tax</th>
							  <td class="invoice-table-subtotal">$<?php echo $model->tax ?></td>
							</tr>
							<tr>
							  <th class="text-right">Shipping</th>
							  <td class="invoice-table-subtotal">$<?php echo $model->shipping ?></td>
							</tr>
							<tr>
							  <th class="text-right"><h5>Total</h5></th>
							  <th class="invoice-table-subtotal"><h5>$<?php echo $model->total ?></h5></th>
							</tr>
						  </tfoot>
						</table>
				      </div>
				    </div>
					
					<div class="row">
					  <div class="col-xs-12 text-center">
				        If you have any questions about this invoice, please contact <br />					
						Billing Support at 423.290.5391 or billing@nihil.co					
				      </div>
				    </div>
					
					<div class="row">
					  <div class="col-xs-12 text-center">
				        <h3>Thank you for your business!</h3>				
				      </div>
				    </div>
					
				  </div>
				</div>
				
			</div>
		  </div>
		</div>
	  </section>