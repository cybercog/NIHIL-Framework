<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Checkout';
$this->params['breadcrumbs'][] = ['label' => 'Checkout', 'url' => '/checkout'];
$this->params['breadcrumbs'][] = ['label' => 'Shipping Method', 'url' => '/checkout/shipping'];
$this->params['breadcrumbs'][] = 'Payment';
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
					<div class="col-md-9">

						<div class="ecom-orders-index">
						
							<div class="row">
								<div class="col-sm-12">
									<h1>Payment</h1>
								</div>
							</div>
							<?php $form = ActiveForm::begin([
								'id' => 'ecom-orderpayment-form',
								'options' => ['onsubmit' => '$("#processingModal").modal("show");'],
							]); ?>

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

							<?= Html::submitButton('continue', ['class' => 'btn btn-success btn-lg pull-right']) ?>

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
					
					</div>
				</div>
			</div>
		</section>