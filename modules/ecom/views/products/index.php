<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Shop';
$this->params['breadcrumbs'][] = 'Shop';
?>

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
		
		<section id="site-content">
			<div class="container">
				<div class="row">
					<div class="col-sm-9">

						<div class="ecom-products-index">
							
							<div class="row">
								<div clss="col-xs-12">
									<h1>Shop</h1>
								</div>
							</div>
							<div class="row">
								
							<?php
								foreach($products as $product) {
							?>
									<div class="col-sm-4">
										<div class="row">
											<div class="col-xs-12">
												<a href="<?php echo Yii::$app->homeUrl; ?>products/<?php echo $product->slug; ?>">
													<?php if($product->image) { ?>
														<img class="img-responsive" src="<?php echo Yii::$app->homeUrl; ?>img/<?php echo $product->image; ?>" />
													<?php }else{ ?>
														<img class="img-responsive" src="http://placehold.it/600x600&text=Product" />
													<?php } ?>
												</a>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12">
												<h2><a href="<?php echo Yii::$app->homeUrl; ?>products/<?php echo $product->slug; ?>"><?php echo $product->name; ?></a></h2>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12">
												<p><?php echo $product->description; ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12">
												<a href="#" class="btn btn-lg btn-block btn-primary">$<?php echo $product->price; ?> | Add to Cart</a>
											</div>
										</div>
										
										
										
									</div>
							<?php
								}
							?>
								
								
							</div>
							
						</div>

					</div>
					<div class="col-sm-3">
						
						<div class="row">
							<div class="col-xs-12">
								<h3>Cart</h3>
							</div>
							<div class="col-xs-12">
								<p>You have 0 items in your cart.</p>
							</div>
						</div>
						
						<div class="row">
							<div class="col-xs-12">
								<h3>Cart</h3>
							</div>
							<div class="col-xs-12">
								<table class="table">
									<thead>
										<tr>
											<th>Item</th>
											<th>Qty</th>
											<th>Price</th>
											<th>&nbsp;</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Jacket</td>
											<td>1</td>
											<td>$100.00</td>
											<td><a href="#">X</a></td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="2" class="text-right">Subtotal</td>
											<td colspan="2" class="text-right">$100.00</td>
										</tr>
										<tr>
											<td colspan="2" class="text-right">Tax</td>
											<td colspan="2" class="text-right">$0.00</td>
										</tr>
										<tr>
											<td colspan="2" class="text-right">Shipping</td>
											<td colspan="2" class="text-right">$0.00</td>
										</tr>
										<tr>
											<td colspan="2" class="text-right">Total</td>
											<td colspan="2" class="text-right">$100.00</td>
										</tr>
									</tfoot>
								</table>
							</div>
							<div class="col-xs-12">
								<a href="#" class="btn btn-lg btn-block btn-success">Checkout</a>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</section>