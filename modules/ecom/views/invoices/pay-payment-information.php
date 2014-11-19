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
				  <div class="col-sm-8">
				    <h1><?= Html::encode('Pay Invoice') ?></h1>
				  </div>
				  <div class="col-sm-4 text-right">
				  
				    <div class="btn-group btn-group-lg invoice-nav">
					  <a href="/ecom/invoices/view/<?php echo $invoice->token; ?>" class="btn btn-default"><i class="fa fa-file-text-o"></i> View</a>
					  <a href="/ecom/invoices/pay/<?php echo $invoice->token; ?>" class="btn btn-default active"><i class="fa fa-credit-card"></i> Pay</a>
					  <button type="button" class="btn btn-default" onclick='window.open("/ecom/invoices/print/<?php echo $invoice->token; ?>", "_blank", "toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=705,height=877")'><i class="fa fa-print"></i> Print</a>
					</div>
					
				  </div>
				</div>

				<div class="row">
				  <div class="col-sm-4 invoice-table">
				    <h2>Overview</h2>
					<h4 class="invoice-header">Invoice Summary:</h4>
					<table class="table table-bordered text-center">
					  <thead>
					  <tr>
					    <td class="invoice-summary-th">Invoice</th>
						<td><?php echo $invoice->invoice_number; ?></td>
					  </tr>
					  <tr>
					    <td class="invoice-summary-th">Due</th>
						<td><?php echo date("F d, Y", strtotime($invoice->date_due)); ?></td>
					  </tr>
					  <tr>
					    <td class="invoice-summary-th">Amount</th>
						<td>$<?php echo $invoice->total; ?></td>
					  </tr>
					  </thead>
					</table>
					
				  </div>
				  <div class="col-sm-8">
				    <h2>Card Information</h2>
					<?php $form = ActiveForm::begin(); ?>
					<div class="row">
					  <div class="col-sm-7">
					    <?= $form->field($model, 'cc_number')->textInput(array('placeholder' => 'XXXX XXXX XXXX XXXX', 'maxlength' => '19', 'size' => '19')); ?>
					  </div>
					  <div class="col-sm-3">
					    <ul class="list-inline" id="payment-cc-list">
						  <li><i class="fa fa-lg fa-cc-mastercard"></i></li>
						  <li><i class="fa fa-lg fa-cc-visa"></i></li>
						  <li><i class="fa fa-lg fa-cc-amex"></i></li>
						  <li><i class="fa fa-lg fa-cc-discover"></i></li>
						</ul>
					  </div>
					  <div class="col-sm-2">
					    <?= $form->field($model, 'cc_cvc')->textInput(array('placeholder' => '123', 'maxlength' => '3', 'size' => '3')); ?>
					  </div>
					</div>
					<div class="row">
					  <div class="col-sm-7">
					    <?= $form->field($model, 'cc_name')->textInput(array('placeholder' => 'John Doe')); ?>
					  </div>
					  <div class="col-sm-5">
					    <div class="row">
						  <div class="col-sm-6">
						    <?= $form->field($model, 'cc_exp_month')->dropdownList($model->monthsDropdown(), ['prompt'=>'MM']); ?>
						  </div>
						  <div class="col-sm-6">
						    <?= $form->field($model, 'cc_exp_year')->dropdownList($model->yearsDropdown(), ['prompt'=>'YYYY']); ?>
						  </div>
						</div>
					    
					  </div>
					</div>
					<div class="row">
					  <div class="col-sm-12">
					    <?= $form->field($model, 'comments')->textarea(['rows' => 5]) ?>
					  </div>
					</div>
					
					<div class="row">
					  <div class="col-sm-12">
					    <?= Html::submitButton('Pay Now', ['class' => 'btn btn-primary btn-lg pull-right']) ?>
					  </div>
					</div>
					
					<?php ActiveForm::end(); ?>
					
				  </div>
				</div>
			
			</div>
		  </div>
		</div>
	  </section>