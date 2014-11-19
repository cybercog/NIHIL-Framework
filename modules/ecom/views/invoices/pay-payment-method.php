<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\Invoice */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - Pay: ' . $invoice->id;
$this->params['breadcrumbs'][] = ['label' => 'Invoices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="invoice-view">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
			
				<div class="row">
				  <div class="col-sm-6">
				    <h1><?= Html::encode('Pay Invoice') ?></h1>
				  </div>
				  <div class="col-sm-3">
					<h5>Step 2: Payment Method</h5>
				    <div class="progress">
					  <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
						25%
					  </div>
					</div>
				  </div>
				</div>
				
				<div class="row">
				  <div class="col-sm-9">
				    
					<?php $form = ActiveForm::begin(); ?>
					
					  <?= $form->field($model, 'method')->radioList($model->getRadioList(),[
						'class' => 'btn-group',
						'data-toggle' => 'buttons',
						'item' => function ($index, $label, $name, $checked, $value) use ($model) {
							return Html::label(
								Html::radio(
									$name,
									$checked,
									['id' => 'method_' . $value, 'value' => $value]
								) . $label,
								'method_' . $value,
								[
									'class' => 'btn btn-default',
								]
							);
						},
					  ]) ?>
					
					  <div class="form-group">
						<?= Html::submitButton('Confirm', ['class' => 'btn btn-primary btn-lg pull-right']) ?>
					  </div>
					
					<?php ActiveForm::end(); ?>
					
					<!--
					<div class="row">
					  <div class="col-sm-2">
						<button type="submit" name="submit-creditcard" class="btn btn-lg btn-block btn-default"><i class="fa fa-3x fa-credit-card"></i><br />Credit Card</button>
					  </div>
					  <div class="col-sm-2">
						<button type="submit" name="submit-check" class="btn btn-lg btn-block btn-default"><i class="fa fa-3x fa-university"></i><br />Check</button>
					  </div>
					  <div class="col-sm-2">
						<button type="submit" name="submit-bitcoin" class="btn btn-lg btn-block btn-default"><i class="fa fa-3x fa-btc"></i><br />Bitcoin</button>
					  </div>
					  <div class="col-sm-2">
						<button type="submit" name="submit-paypal" class="btn btn-lg btn-block btn-default"><i class="fa fa-3x fa-paypal"></i><br />PayPal</button>
					  </div>
					  <div class="col-sm-2">
						<button type="submit" name="submit-wallet" class="btn btn-lg btn-block btn-default"><i class="fa fa-3x fa-google-wallet"></i><br />Google</button>
					  </div>
					</div>
					-->
					
					
				  </div>
				</div>
			
			</div>
		  </div>
		</div>
	  </section>