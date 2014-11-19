<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\Payment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<div class="row">
	  <div class="col-sm-10">
        <?= $form->field($model, 'name')->textInput(['maxlength' => 100]); ?>
	  </div>
	  <div class="col-sm-2">
        <?= $form->field($model, 'cvv2')->textInput(['maxlength' => 128]); ?>
      </div>
	</div>
    
	<div class="row">
	  <div class="col-sm-8">
        <?= $form->field($model, 'card_number')->textInput(['maxlength' => 100]); ?>
      </div>
	  <div class="col-sm-2">
        <?= $form->field($model, 'card_exp_month')->dropDownList($model->monthsDropdown(),['prompt'=>'']); ?>
      </div>
	  <div class="col-sm-2">
        <?= $form->field($model, 'card_exp_year')->dropDownList($model->yearsDropdown(),['prompt'=>'']); ?>
      </div>
	</div>
	
    <div class="row">
	  <div class="col-sm-12">
        <?= $form->field($model, 'comments')->textarea(['rows' => 6]); ?>
	  </div>
	</div>

    <div class="form-group">
        <?= Html::submitButton('Pay Now', ['class' => 'btn btn-primary pull-right']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
