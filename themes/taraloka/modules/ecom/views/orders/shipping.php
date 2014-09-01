<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Checkout';
$this->params['breadcrumbs'][] = ['label' => 'Checkout', 'url' => '/checkout'];
$this->params['breadcrumbs'][] = 'Shipping Method';
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
							<h1>Shipping Method</h1>
							<p>Step 2: Select a shipping method.</p>
						</div>
						
						<?php $form = ActiveForm::begin([
							'id' => 'ecom-checkoutshippingmethod-form',
						]); ?>
						
						<div class="radio">
						  <label>
							<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
							<strong>$0.00 - USPS Flat Rate Box</strong><br />
							Estimated Delivery: September 22, 2014
						  </label>
						</div>

						<a href="/checkout" class="btn btn-lg btn-success pull-left">back</a>
						<?= Html::submitButton('continue', ['class' => 'btn btn-success btn-lg pull-right']) ?>

						<?php ActiveForm::end(); ?>
						
					</div>
				</div>
			</div>
		</section>