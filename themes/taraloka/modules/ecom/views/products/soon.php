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
									<p>Merchandise will be available soon.</p>
								</div>
							</div>
							<div class="row">
								
								
							</div>
							
						</div>

					</div>
					<div class="col-sm-3">
						
						<?= SubscribeWidget::widget(); ?>
						
					</div>
				</div>
			</div>
		</section>