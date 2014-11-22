<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

use app\modules\pda\widgets\SubscribeWidget;

/* @var $this yii\web\View */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Checkout Success';
$this->params['breadcrumbs'][] = 'Checkout';
$this->params['breadcrumbs'][] = 'Success';
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
									<h1>Thank You For Your Order!</h1>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-12">
								
									<img src="/img/donation_success.png" alt="" class="pull-right content-image" />
								
									<p>Your order was successfully processed.  Check your email because we just sent you a receipt.  If you have any questions, concerns, or comments contact us at <a href="mailto:support@taraloka.org">support@taraloka.org</a>.  Remember to allow 1-3 days processing.</p>
								</div>
							</div>
						</div>

					</div>
					<div class="col-sm-3">
						<div class="row">
							<div class="col-xs-12">
							
								<?= SubscribeWidget::widget(); ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>