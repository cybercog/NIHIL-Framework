<?php

use yii\helpers\Html;

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
					<h5>Step 1: Billing Information</h5>
				    <div class="progress">
					  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
						0%
					  </div>
					</div>
				  </div>
				</div>
				
				<div class="row">
				  <div class="col-sm-9">
					
					<?= $this->render('..\contacts\_form-simple', [
						'model' => $model,
					]) ?>
					
				  </div>
				</div>
			
			</div>
		  </div>
		</div>
	  </section>