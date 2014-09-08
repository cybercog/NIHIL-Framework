<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Checkout';
$this->params['breadcrumbs'][] = ['label' => 'Checkout', 'url' => '/checkout'];
$this->params['breadcrumbs'][] = ['label' => 'Shipping Method', 'url' => '/checkout/shipping'];
$this->params['breadcrumbs'][] = ['label' => 'Payment', 'url' => '/checkout/payment'];
$this->params['breadcrumbs'][] = 'Confirm';
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
					<div class="col-md-9">

						<div class="ecom-orders-index">
							
							<div class="row">
								<div class="col-sm-12">
									<h1>Checkout Confirm</h1>
									<p>Does everything look correct?</p>
								</div>
							</div>
						
							<?php $form = ActiveForm::begin([
								'id' => 'ecom-checkoutconfirm-form',
							]); ?>
							<div class="row">
								<div class="col-sm-12">
									<h2>Billing Information</h2>
									<strong>Card Number:</strong> <?php echo $payment->account_number; ?><br />
									<strong>Card Type:</strong> <?php echo $payment->account_type; ?><br /><br />
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-6">
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
								<div class="col-sm-6">
									<h2>Shipping Address</h2>
									<strong>Name:</strong> <?php echo $customer->first . ' ' . $customer->last; ?><br />
									<?php if($customer->phone) { echo '<strong>Phone:</strong> ' . $customer->phone . '<br />'; } ?>
									<strong>Email:</strong> <?php echo $customer->email; ?><br />
									<strong>Address:</strong> <?php echo $customer->address1; ?><br />
									<strong>City:</strong> <?php echo $customer->city; ?><br />
									<strong>State:</strong> <?php echo $customer->state; ?><br />
									<strong>Zipcode:</strong> <?php echo $customer->zipcode; ?><br /><br />
									
									<?php if($payment->comments) { echo '<strong>Comments:</strong> ' . $payment->comments . '<br /><br />'; } ?>
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

							<?php if($model) { ?>
								<div class="row">
									<?php $form = ActiveForm::begin([
										'id' => 'ecom-payment-form',
										'options' => ['onsubmit' => '$("#processingModal").modal("show");'],
									]); ?>
									<div class="col-md-8">
										<small>Note: By pressing the following button, you will confirm your order.  Please do not press back or refresh.</small>
									</div>
									<div class="col-md-4">
											<?php echo $form->field($model, 'token')->hiddenInput(['value' => $token]); ?>
											<?= Html::submitButton('confirm order', ['class' => 'btn btn-success btn-lg pull-right']) ?>
									</div>
									<?php ActiveForm::end(); ?>
								</div>
								<?php } ?>

							<?php ActiveForm::end(); ?>
						
						</div>
						
						<!-- Modal -->
						<div class="modal fade" id="processingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Your Payment Is Being Processed</h4>
							  </div>
							  <div class="modal-body" style="text-align:center;">
									<i class="fa fa-spinner fa-spin fa-5x"></i><br />
									Please do not refresh the page or click to go back.
								</center>
							  </div>
							</div>
						  </div>
						</div>

					</div>
				</div>
			</div>
		</section>