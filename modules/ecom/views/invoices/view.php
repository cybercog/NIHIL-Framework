<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\DetailView;

/* @var $this yii\web\View */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Invoices View';
$this->params['breadcrumbs'][] = ['label' => 'Invoices', 'url' => '/ecom/invoices'];
$this->params['breadcrumbs'][] = 'View';
?>
		<!--
		<section id="site-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
		
						<?= Breadcrumbs::widget([
							'homeLink' => [
								'label' => 'Home',
								'template' => "<li><a href='\'><i class='fa fa-home'></i></a></li>\n",
							],
							'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
						]) ?>
			
					</div>
				</div>
			</div>
		</section>
		-->
		
		<section id="site-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">

						<div class="ecom-invoices-view">
							<div class="row">
								<div class="col-sm-12">
									<h1>Invoice</h1>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<h2>Billing Information</h2>
									<strong>Card Number:</strong> <?php echo $payment->account_number; ?><br />
									<strong>Card Type:</strong> <?php echo $payment->account_type; ?><br /><br /> 
									<?php 
										if($invoice->invoice_status_id == 1) {
											echo '<span class="label label-invoice label-new">New</span>';
										}elseif($invoice->invoice_status_id == 2) {
											echo '<span class="label label-invoice label-warning">Overdue</span>';
										}elseif($invoice->invoice_status_id == 3) {
											echo '<span class="label label-invoice label-paid">Paid</span>';
										}elseif($invoice->invoice_status_id == 4) {
											echo '<span class="label label-invoice label-success">Authorized</span>';
										}elseif($invoice->invoice_status_id == 5) {
											echo '<span class="label label-invoice label-info">Pledged</span>';
										}elseif($invoice->invoice_status_id == 6) {
											echo '<span class="label label-invoice label-default">Expired</span>';
										}elseif($invoice->invoice_status_id == 7) {
											echo '<span class="label label-invoice label-danger">Needs Revision</span>';
										}
									?>
								</div>
								<div class="col-sm-3">
									<h2>Billing Address</h2>
									<strong>Name:</strong> <?php echo $customer->first . ' ' . $customer->last; ?><br />
									<?php if($customer->phone) { echo '<strong>Phone:</strong> ' . $customer->phone . '<br />'; } ?>
									<strong>Email:</strong> <?php echo $customer->email; ?><br />
									<strong>Address:</strong> <?php echo $customer->address1; ?><br />
									<strong>City:</strong> <?php echo $customer->city; ?><br />
									<strong>State:</strong> <?php echo $customer->state; ?><br />
									<strong>Zipcode:</strong> <?php echo $customer->zipcode; ?><br /><br />
									
									<?php if($payment->comments) { echo '<strong>Comments:</strong> ' . $payment->comments . '<br /><br />'; } ?>
								</div>
								<div class="col-sm-3">
									<h2>Shipping Address</h2>
									<?php if(isset($shipping_address)){ ?>
									<strong>Name:</strong> <?php echo $shipping_address->first . ' ' . $shipping_address->last; ?><br />
									<?php if($shipping_address->phone) { echo '<strong>Phone:</strong> ' . $shipping_address->phone . '<br />'; } ?>
									<strong>Email:</strong> <?php echo $shipping_address->email; ?><br />
									<strong>Address:</strong> <?php echo $shipping_address->address1; ?><br />
									<strong>City:</strong> <?php echo $shipping_address->city; ?><br />
									<strong>State:</strong> <?php echo $shipping_address->state; ?><br />
									<strong>Zipcode:</strong> <?php echo $shipping_address->zipcode; ?><br /><br />
									<?php }else{ ?>
									<strong>Name:</strong> <?php echo $customer->first . ' ' . $customer->last; ?><br />
									<?php if($customer->phone) { echo '<strong>Phone:</strong> ' . $customer->phone . '<br />'; } ?>
									<strong>Email:</strong> <?php echo $customer->email; ?><br />
									<strong>Address:</strong> <?php echo $customer->address1; ?><br />
									<strong>City:</strong> <?php echo $customer->city; ?><br />
									<strong>State:</strong> <?php echo $customer->state; ?><br />
									<strong>Zipcode:</strong> <?php echo $customer->zipcode; ?><br /><br />
									<?php } ?>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-12">
									<table class="table table-striped table-bordered">
									  <thead>
										<tr>
											<th colspan="4" class="text-left">Order Summary</th>
										</tr>
									  </thead>
									  <tbody>
										<tr>
											<th class="text-right">Qty</th>
											<th style="min-width:150px;">Item</th>
											<th class="text-right">Price</th>
											<th class="text-right">Subtotal</th>
										</tr>
										<?php foreach($invoice->invoiceItems as $item) { ?>
											<tr>
												<td class="text-right"><?php echo $item->quantity; ?></td>
												<td><?php echo $item->name; ?></td>
												<td class="text-right">$<?php echo $item->unit_price; ?></td>
												<td class="text-right">$<?php echo $item->total; ?></td>
											</tr>
										<?php } ?>
									  </tbody>
									  <tfoot>
										<tr>
											<th colspan="3" class="text-right">Subtotal</th>
											<th class="text-right">$<?php echo $invoice->subtotal; ?></th>
										</tr>
										<tr>
											<th colspan="3" class="text-right">Tax</th>
											<th class="text-right">$<?php echo $invoice->tax; ?></th>
										</tr>
										<tr>
											<th colspan="3" class="text-right">Shipping</th>
											<th class="text-right">$<?php echo $invoice->shipping; ?></th>
										</tr>
										<tr>
											<th colspan="3" class="text-right total">Total</th>
											<th class="text-right total total-amount">$<?php echo $invoice->total; ?></th>
										</tr>
									  </tfoot>
									</table>
								</div>
							</div>

							
						</div>

					</div>
				</div>
			</div>
		</section>