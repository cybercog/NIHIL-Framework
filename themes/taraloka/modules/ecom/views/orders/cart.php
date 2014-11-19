<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\modules\ecom\components\CartWidget;

use app\modules\ecom\models\Product;
use app\modules\ecom\models\Attribute;

/* @var $this yii\web\View */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Cart';
$this->params['breadcrumbs'][] = 'Cart';
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

						<div class="ecom-orderitems-index">
							<div class="row">
								<div class="col-sm-12">
									<h1>Cart</h1>
									<div class="alert alert-warning" role="alert">The shop is currently in test mode.  All transactions will not be processed.</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-12">
									<table class="table table-striped table-bordered">
									  <thead>
										<tr>
											<th colspan="5" class="text-left">Order Summary</th>
										</tr>
									  </thead>
									  <tbody>
										<tr>
											<th class="text-right">Qty</th>
											<th style="min-width:150px;">Item</th>
											<th class="text-right">Price</th>
											<th class="text-right">Subtotal</th>
											<th style="width:30px">&nbsp;</th>
										</tr>
										<?php foreach(\Yii::$app->cart->getItems() as $key => $item) { ?>
											<?php
												$product = Product::find()
													->where(['id' => $item['productAttribute']->product_id])
													->one();
												$attribute = Attribute::find()
													->where(['id' => $item['productAttribute']->attribute_id])
													->one();
											?>
											<tr>
												<td class="text-right"><?php echo $item['quantity']; ?></td>
												<td><?php echo $product->name . ' - ' . $attribute->name; ?></td>
												<td class="text-right">$<?php echo number_format(($product->price + $item['productAttribute']->additional_price),2); ?></td>
												<td class="text-right">$<?php echo number_format($item['quantity']*($product->price + $item['productAttribute']->additional_price),2); ?></td>
												<td><a href="/cart/remove/<?php echo $key; ?>" title="Remove"><i class="fa fa-times"></i></a></td>
											</tr>
										<?php } ?>
									  </tbody>
									  <tfoot>
										<tr>
											<th colspan="3" class="text-right">Subtotal</th>
											<th colspan="2" class="text-right">$<?php echo number_format(\Yii::$app->cart->getSubtotal(),2); ?></th>
										</tr>
										<tr>
											<th colspan="3" class="text-right">Tax</th>
											<th colspan="2" class="text-right">$<?php echo number_format(\Yii::$app->cart->getTax(),2); ?></th>
										</tr>
										<tr>
											<th colspan="3" class="text-right">Shipping</th>
											<th colspan="2" class="text-right">$<?php echo number_format(\Yii::$app->cart->getShipping(),2); ?></th>
										</tr>
										<tr>
											<th colspan="3" class="text-right total">Total</th>
											<th colspan="2" class="text-right total total-amount">$<?php echo number_format(\Yii::$app->cart->getTotal(),2); ?></th>
										</tr>
									  </tfoot>
									</table>
									
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<a href="/shop" class="btn btn-success btn-lg">shop</a>
								</div>
								<div class="col-sm-6">
									<a href="/checkout/shipping" class="btn btn-success btn-lg pull-right">checkout</a>
								</div>
							</div>
							
						</div>

					</div>
				</div>
			</div>
		</section>