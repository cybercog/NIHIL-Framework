<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\modules\ecom\components\CartWidget;
use app\modules\core\widgets\MailingListWidget;
use app\modules\pda\widgets\SubscribeWidget;

/* @var $this yii\web\View */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Shop';
$this->params['breadcrumbs'][] = 'Shop';
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
								<a href="<?php echo Yii::$app->homeUrl; ?>products/<?php echo $product->slug; ?>">
									<div class="col-sm-4">
										<div class="row">
											<div class="col-xs-12">
												<?php if($product->image) { ?>
													<img class="img-responsive" src="<?php echo Yii::$app->homeUrl; ?>img/<?php echo $product->image; ?>" />
												<?php }else{ ?>
													<img class="img-responsive" src="<?php echo Yii::$app->homeUrl; ?>img/Product_600x600.gif" />
												<?php } ?>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12 text-center">
												<h2 class="product-index-name"><?php echo $product->name; ?></h2>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12 text-center">
												<h3 class="product-index-price">$<?php echo $product->price; ?></h3>
											</div>
										</div>	
									</div>
								</a>
							<?php
								}
							?>
								
								
							</div>
							
						</div>

					</div>
					<div class="col-sm-3">
						
						<?= CartWidget::widget(); ?>
						
						<?= SubscribeWidget::widget(); ?>
						
					</div>
				</div>
			</div>
		</section>