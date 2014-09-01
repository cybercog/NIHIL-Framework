<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Checkout';
$this->params['breadcrumbs'][] = ['label' => 'Checkout', 'url' => '/checkout'];
$this->params['breadcrumbs'][] = 'Shipping Method';
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
									<h1>Shipping Address</h1>
								</div>
							</div>
							<?php $form = ActiveForm::begin([
								'id' => 'ecom-ordershippingaddress-form',
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
							<div class="row">
								<div class="col-md-12">
									<?= $form->field($model, 'comments')->textarea(['rows' => 5]) ?>
								</div>
							</div>

							<?= Html::submitButton('Continue', ['class' => 'btn btn-success btn-lg pull-right']) ?>

							<?php ActiveForm::end(); ?>

						</div>

					</div>
					<div class="col-sm-3">
					
					</div>
				</div>
			</div>
		</section>