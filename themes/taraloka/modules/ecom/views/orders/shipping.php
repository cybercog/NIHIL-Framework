<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;

use app\modules\ecom\components\CartWidget;
use app\modules\core\widgets\MailingListWidget;

/* @var $this yii\web\View */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Checkout';
$this->params['breadcrumbs'][] = 'Checkout';
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

						<div class="ecom-payments-index">
						
							<div class="row">
								<div class="col-sm-12">
									<h1>Shipping Address</h1>
									<p>First we need your shipping address.</p>
								</div>
							</div>
							<?php $form = ActiveForm::begin([
								'id' => 'ecom-checkoutshippingaddress-form',
							]); ?>
							
							<div class="row">
								<div class="col-md-6">
									<?= $form->field($model, 'first_name') ?>
								</div>
								<div class="col-md-6">
									<?= $form->field($model, 'last_name') ?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-7">
									<?= $form->field($model, 'email') ?>
								</div>
								<div class="col-md-5">
									<?= $form->field($model, 'phone') ?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<?= $form->field($model, 'address1') ?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<?= $form->field($model, 'address2') ?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-7">
									<?= $form->field($model, 'city') ?>
								</div>
								<div class="col-md-2">
									<?= $form->field($model, 'state')->dropDownList($model->statesDropdown(),['prompt'=>'']); ?>
								</div>
								<div class="col-md-3">
									<?= $form->field($model, 'postal_code') ?>
								</div>
							</div>

							<?= Html::submitButton('continue', ['class' => 'btn btn-success btn-lg pull-right']) ?>

							<?php ActiveForm::end(); ?>
							
						</div>

					</div>
					<div class="col-sm-3">
						
						&nbsp;
					
					</div>
				</div>
			</div>
		</section>