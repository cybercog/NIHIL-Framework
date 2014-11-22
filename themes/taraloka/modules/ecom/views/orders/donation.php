<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;

use app\modules\ecom\components\CartWidget;
use app\modules\core\widgets\MailingListWidget;
use app\modules\pda\widgets\SubscribeWidget;

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
							<h1>Add A Donation?</h1>
							<p>Step 2: Would you like to add a donation?</p>
						</div>
						
						<?php $form = ActiveForm::begin([
							'id' => 'ecom-checkoutdonation-form',
						]); ?>
						
						<div class="row" style="margin-bottom:10px;">
								<div class="col-md-12">
									<button type="button" class="btn btn-success btn-lg btn-donate-amount" onclick="document.getElementById('checkoutdonationform-amount').value = Number(250).toFixed(2);">$250</button>
									<button type="button" class="btn btn-success btn-lg btn-donate-amount" onclick="document.getElementById('checkoutdonationform-amount').value = Number(100).toFixed(2);">$100</button>
									<button type="button" class="btn btn-success btn-lg btn-donate-amount" onclick="document.getElementById('checkoutdonationform-amount').value = Number(50).toFixed(2);">$50</button>
									<button type="button" class="btn btn-success btn-lg btn-donate-amount" onclick="document.getElementById('checkoutdonationform-amount').value = Number(25).toFixed(2);">$25</button>
									<button type="button" class="btn btn-success btn-lg btn-donate-amount" onclick="document.getElementById('checkoutdonationform-amount').value = ''; document.getElementById('checkoutdonationform-amount').focus();">Other</button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<?= $form->field($model, 'amount') ?>
								</div>
								<div class="col-md-5">
									<label>Recurrence</label><br />
									<div class="btn-group" data-toggle="buttons">
									  <label class="btn btn-default active">
										<input type="radio" name="recurrence" id="recurrence-once" value="once" checked> Once
									  </label>
									  <label class="btn btn-default disabled">
										<input type="radio" name="recurrence" id="recurrence-monthly" value="monthly"> Monthly
									  </label>
									  <label class="btn btn-default disabled">
										<input type="radio" name="recurrence" id="recurrence-yearly" value="yearly"> Yearly
									  </label>
									</div>
								</div>

							</div>

						<a href="/checkout/shipping" class="btn btn-lg btn-success pull-left">back</a>
						<?= Html::submitButton('continue', ['class' => 'btn btn-success btn-lg pull-right']) ?>

						<?php ActiveForm::end(); ?>
						
					</div>
					<div class="col-sm-3">
						
						&nbsp;
					
					</div>
				</div>
			</div>
		</section>