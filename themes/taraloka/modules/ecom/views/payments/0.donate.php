<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
use app\modules\core\widgets\MailingListWidget;

/* @var $this yii\web\View */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Donate';
$this->params['breadcrumbs'][] = 'Donate';
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
									<h1>Donate</h1>
								</div>
							</div>
							<?php $form = ActiveForm::begin([
								'id' => 'ecom-donate-form',
								'options' => ['onsubmit' => '$("#processingModal").modal("show");'],
							]); ?>
							<div class="row" style="margin-bottom:10px;">
								<div class="col-md-12">
									<button type="button" class="btn btn-success btn-lg btn-donate-amount" onclick="document.getElementById('donationform-amount').value = Number(250).toFixed(2);">$250</button>
									<button type="button" class="btn btn-success btn-lg btn-donate-amount" onclick="document.getElementById('donationform-amount').value = Number(100).toFixed(2);">$100</button>
									<button type="button" class="btn btn-success btn-lg btn-donate-amount" onclick="document.getElementById('donationform-amount').value = Number(50).toFixed(2);">$50</button>
									<button type="button" class="btn btn-success btn-lg btn-donate-amount" onclick="document.getElementById('donationform-amount').value = Number(25).toFixed(2);">$25</button>
									<button type="button" class="btn btn-success btn-lg btn-donate-amount" onclick="document.getElementById('donationform-amount').value = ''; document.getElementById('donationform-amount').focus();">Other</button>
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
										<input type="radio" name="recurrence" id="recurrence-once" value="monthly" disabled> Monthly
									  </label>
									  <label class="btn btn-default disabled" >
										<input type="radio" name="recurrence" id="recurrence-once" value="annual" disabled> Annual
									  </label>
									</div>
									<!--<a href="/donate/recurring" class="btn btn-default">Setup Recuring Donation</a>-->
								</div>

							</div>
							<div class="row">
								<div class="col-md-5">
									<?= $form->field($model, 'card_number') ?>
								</div>
								<div class="col-md-2">
									<?= $form->field($model, 'card_exp_month')->dropDownList($model->monthsDropdown(),['prompt'=>'']); ?>
								</div>
								<div class="col-md-3">
									<?= $form->field($model, 'card_exp_year')->dropDownList($model->yearsDropdown(),['prompt'=>'']); ?>
								</div>
								<div class="col-md-2">
									<?= $form->field($model, 'card_cvv2') ?>
								</div>
							</div>
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
							<div class="row">
								<div class="col-md-12">
									<?= $form->field($model, 'comments')->textarea(['rows' => 5]) ?>
								</div>
							</div>

									<?= Html::submitButton('Donate', ['class' => 'btn btn-success btn-lg pull-right']) ?>

							<?php ActiveForm::end(); ?>

							<!-- Modal -->
							<div class="modal fade" id="processingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">Your Payment Is Being Authorized</h4>
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
					<div class="col-sm-3">
						<div class="row">
							<div class="col-xs-12">
								<h4><strong>The Taraloka Foundation</strong> creates opportunities for Himalayan children by providing education, healthcare, and a safe refuge.</h4>
								<p>We are a registered 501(c)3 organization and your donation is tax deductible.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>