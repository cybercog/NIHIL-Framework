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
					<h5>Step 3: Add Exrtas</h5>
				    <div class="progress">
					  <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
						40%
					  </div>
					</div>
				  </div>
				</div>

				<div class="row">
				  <div class="col-sm-9">
				    
					<?php $form = ActiveForm::begin(); ?>

					<div class="row">
					  <div class="col-sm-12">
						<?= $form->field($model, 'gratuity')->textInput(['maxlength' => 10]) ?>
					  </div>
					</div>
					
					<div class="row">
					  <div class="col-sm-12">
						
						<div class="form-group">
							<?= Html::submitButton('Confirm', ['class' => 'btn btn-primary btn-lg pull-right']) ?>
						</div>
						
					  </div>
					</div>

					<?php ActiveForm::end(); ?>
					
				  </div>
				</div>
			
			</div>
		  </div>
		</div>
	  </section>