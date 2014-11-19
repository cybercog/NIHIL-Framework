<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\Invoice */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - View: ' . $model->id;
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
		    <div class="col-sm-12">

				<div class="row">
				  <div class="col-sm-8">
				    <h1><?= Html::encode('View Invoice') ?></h1>
				  </div>
				  <div class="col-sm-4 text-right">
				  
				    <div class="btn-group btn-group-lg invoice-nav">
					  <a href="/ecom/invoices/view/<?php echo $model->token; ?>" class="btn btn-default active"><i class="fa fa-file-text-o"></i> View</a>
					  <?php if(!$model->payment_id) { echo '<a href="/ecom/invoices/pay/' . $model->token . '" class="btn btn-default"><i class="fa fa-credit-card"></i> Pay</a>'; } ?>
					  <button type="button" class="btn btn-default" onclick='window.open("/ecom/invoices/print/<?php echo $model->token; ?>", "_blank", "toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=705,height=877")'><i class="fa fa-print"></i> Print</a>
					</div>
					
				  </div>
				</div>
				
				<div class="row invoice-wrapper">
				  <div class="col-xs-12">
				  
				    <div class="row">
					  <div class="col-sm-8">
				        <h2 id="invoice-header-nihil">The <span>NIHIL</span> Corporation</h2>
				      </div>
					  <div class="col-sm-4 text-right">
				        <h2 id="invoice-header-invoice">INVOICE</h2>
				      </div>
				    </div>
					
					<div class="row">
					  <div class="col-sm-6">
				        Billing & Sales Department
				      </div>
					  <div class="col-sm-4 col-sm-offset-2 text-right">
					    Invoice #: <?php echo $model->invoice_number; ?>
				      </div>
				    </div>
					<div class="row">
					  <div class="col-sm-6">
				        6409 Sail Pointe Lane
				      </div>
					  <div class="col-sm-4 col-sm-offset-2 text-right">
				        Due: <?php echo date("m/d/Y", strtotime($model->date_due)); ?>
				      </div>
				    </div>
					<div class="row">
					  <div class="col-sm-6">
				        Hixson, TN 37343
				      </div>
					  <div class="col-sm-4 col-sm-offset-2 text-right">
				        <!-- spacer -->&nbsp;
				      </div>
				    </div>
					<div class="row">
					  <div class="col-sm-6">
				        <a href="tel:14232905391">(423) 290-5391</a><br />
						<a href="mailto:billing@nihil.co">billing@nihil.co</a>
				      </div>
					  <div class="col-sm-4 col-sm-offset-2 text-right">
				        <?php echo $statusLabels[$model->invoice_status_id]; ?>
				      </div>
				    </div>
					
					<div class="row">
					  <div class="col-sm-4">
				        <h4 class="invoice-header">Billing Address: <?php if($model->invoice_status_id == 1 OR $model->invoice_status_id == 2 OR $model->invoice_status_id == 4 OR $model->invoice_status_id == 5) { echo '<a href="#" class="pull-right" title="Edit"><i class="fa fa-edit"></i></a>'; } ?></h4>
				      </div>
					  <div class="col-sm-4">
				        <h4 class="invoice-header">Shipping Address: <?php if($model->invoice_status_id == 1 OR $model->invoice_status_id == 2 OR $model->invoice_status_id == 4 OR $model->invoice_status_id == 5) { echo '<a href="#" class="pull-right" title="Edit"><i class="fa fa-edit"></i></a>'; } ?></h4>
				      </div>
				    </div>
					<div class="row">
					  <div class="col-sm-4">
				        <?php echo $model->billingContact->first . ' ' . $model->billingContact->last; ?>
				      </div>
					  <div class="col-sm-4">
				        <?php echo $model->shippingContact->first . ' ' . $model->shippingContact->last; ?>
				      </div>
				    </div>
					<div class="row">
					  <div class="col-sm-4">
				        <?php echo $model->billingContact->company; ?>
				      </div>
					  <div class="col-sm-4">
				        <?php echo $model->shippingContact->company; ?>
				      </div>
				    </div>
					<div class="row">
					  <div class="col-sm-4">
				        <?php echo $model->billingContact->address1; ?>
				      </div>
					  <div class="col-sm-4">
				        <?php echo $model->shippingContact->address1; ?>
				      </div>
				    </div>
					<div class="row">
					  <div class="col-sm-4">
				        <?php echo $model->billingContact->address2; ?>
				      </div>
					  <div class="col-sm-4">
				        <?php echo $model->shippingContact->address2; ?>
				      </div>
				    </div>
					<div class="row">
					  <div class="col-sm-4">
				        <?php echo $model->billingContact->city; ?>, <?php echo $model->billingContact->state; ?> <?php echo $model->billingContact->zipcode; ?>, <?php echo $model->billingContact->country; ?>
				      </div>
					  <div class="col-sm-4">
				        <?php echo $model->shippingContact->city; ?>, <?php echo $model->shippingContact->state; ?> <?php echo $model->shippingContact->zipcode; ?>, <?php echo $model->shippingContact->country; ?>
				      </div>
				    </div>
					<div class="row">
					  <div class="col-sm-4">
				        <?php echo $model->billingContact->phone; ?>
				      </div>
					  <div class="col-sm-4">
				        <?php echo $model->shippingContact->phone; ?>
				      </div>
				    </div>
					<div class="row">
					  <div class="col-sm-4">
				        <?php echo $model->billingContact->email; ?>
				      </div>
					  <div class="col-sm-4">
				        <?php echo $model->shippingContact->email; ?>
				      </div>
				    </div>
					
					<div class="row">
					  <div class="col-sm-12">
				        <h4 class="invoice-header">Itemized Breakdown:</h4>
				      </div>
				    </div>
					
					<div class="row">
					  <div class="col-sm-12 invoice-table">
				        <table class="table table-bordered">
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
							  <td colspan="2" rowspan="5" id="invoice-table-comments">
							    <h5 class="invoice-header-comments">Other Comments</h5>
								<ol class="invoice-comments-list">
								  <li>Total payment due in 30 days.</li>
								  <li>Please include the invoice number on your check.</li>
								  <li>Keep this invoice for your records.</li>
								</ol>
							  </td>
							  <th class="text-right">Subtotal</th>
							  <td class="invoice-table-total">$<?php echo $model->subtotal ?></td>
							</tr>
							<tr>
							  <th class="text-right">Tax Rate</th>
							  <td class="invoice-table-total">0.00%</td>
							</tr>
							<tr>
							  <th class="text-right">Tax</th>
							  <td class="invoice-table-total">$<?php echo $model->tax ?></td>
							</tr>
							<tr>
							  <th class="text-right invoice-shipping-cell">Shipping</th>
							  <td class="invoice-table-total invoice-shipping-cell">$<?php echo $model->shipping ?></td>
							</tr>
							<tr>
							  <th class="text-right invoice-total-cell"><h5 class="invoice-header-total">Total</h5></th>
							  <th class="invoice-table-total invoice-total-cell"><h5 class="invoice-header-total">$<?php echo $model->total ?></h5></th>
							</tr>
						  </tfoot>
						</table>
				      </div>
				    </div>
					
					<?php if($model->payment_id) { ?>
						<div class="row">
						  <div class="col-sm-12">
							<h4 class="invoice-header">Payment Information:</h4>
						  </div>
						</div>
						
						<div class="row">
						  <div class="col-sm-12 invoice-table">
							<table class="table table-bordered">
							  <tbody>
								<tr>
								  <th>Date</th>
								  <th>Method</th>
								  <th>Account Type</th>
								  <th>Account Number</th>
								  <th>Amount</th>
								</tr>
								<tr>
								  <td><?php echo $model->payment->date_created; ?></td>
								  <td><?php echo $model->payment->paymentMethod->name; ?></td>
								  <td><?php echo $model->payment->account_type; ?></td>
								  <td><?php echo $model->payment->account_number; ?></td>
								  <td><?php echo $model->payment->amount; ?></td>
								</tr>
								<tr>
								  <th colspan="5">Comments</th>
								</tr>
								<tr>
									<?php if($model->payment->comments) { ?>
									<td colspan="5"><?php echo $model->payment->comments; ?></td>
									<?php }else{ ?>
									<td colspan="5">No comments associated with payment.</td>
									<?php } ?>
								</tr>
							  </tbody>  
							</table>
						  </div>
						</div>
					<?php } ?>
					
					<div class="row">
					  <div class="col-sm-12 text-center">
				        If you have any questions about this invoice, please contact the<br />					
						Billing & Sales Department at <a href="tel:14232905391">+1.423.290.5391</a> or <a href="mailto:billing@nihil.co">billing@nihil.co</a>.					
				      </div>
				    </div>
					
					<div class="row">
					  <div class="col-sm-12 text-center">
				        <h3>Thank you for your business!</h3>				
				      </div>
				    </div>
					
				  </div>
				</div>
				
			</div>
		  </div>
		</div>
	  </section>