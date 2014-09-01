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

$invoice = array();
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
								<div class="col-sm-6">
									<h2>Billing Information</h2>
								</div>
								<div class="col-sm-6">
									<h2>Shipping Address</h2>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-12">
									<table class="table table-striped table-bordered">
									  <thead>
										<tr>
											<th colspan="3" class="text-left">Order Summary</th>
										</tr>
									  </thead>
									  <tbody>
										<tr>
											<th style="min-width:150px;">Item</th>
											<th class="text-right">Qty</th>
											<th class="text-right">Subtotal</th>
										</tr>
										<?php foreach($invoice->invoiceItems as $item) { ?>
											<tr>
												<td><?php echo $item->name; ?></td>
												<td class="text-right"><?php echo $item->quantity; ?></td>
												<td class="text-right">$<?php echo $item->total; ?></td>
											</tr>
										<?php } ?>
									  </tbody>
									  <tfoot>
										<tr>
											<th colspan="2" class="text-right">Subtotal</th>
											<th class="text-right">$<?php echo $invoice->subtotal; ?></th>
										</tr>
										<tr>
											<th colspan="2" class="text-right">Tax</th>
											<th class="text-right">$<?php echo $invoice->tax; ?></th>
										</tr>
										<tr>
											<th colspan="2" class="text-right">Shipping</th>
											<th class="text-right">$<?php echo $invoice->shipping; ?></th>
										</tr>
										<tr>
											<th colspan="2" class="text-right total">Total</th>
											<th class="text-right total total-amount">$<?php echo $invoice->total; ?></th>
										</tr>
									  </tfoot>
									</table>
								</div>
							</div>

							<a href="/checkout" class="btn btn-lg btn-success pull-left">back</a>
							<?= Html::submitButton('confirm', ['class' => 'btn btn-success btn-lg pull-right']) ?>

							<?php ActiveForm::end(); ?>
						
						</div>

					</div>
				</div>
			</div>
		</section>