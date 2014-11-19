<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\Contact */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">
	  <div class="col-sm-5">
	    <?= $form->field($model, 'first')->textInput(['maxlength' => 100]) ?>
	  </div>
	  <div class="col-sm-1">
	    <?= $form->field($model, 'middle')->textInput(['maxlength' => 100]) ?>
	  </div>
	  <div class="col-sm-5">
	    <?= $form->field($model, 'last')->textInput(['maxlength' => 100]) ?>
	  </div>
	  <div class="col-sm-1">
	    <?= $form->field($model, 'suffix')->textInput(['maxlength' => 8]) ?>
	  </div>
	</div>
	
	<div class="row">
	  <div class="col-sm-12">
	    <?= $form->field($model, 'company')->textInput(['maxlength' => 150]) ?>
	  </div>
	</div>
	
	<div class="row">
	  <div class="col-sm-8">
	    <?= $form->field($model, 'email')->textInput(['maxlength' => 150]) ?>
	  </div>
	  <div class="col-sm-4">
	    <?= $form->field($model, 'phone')->textInput(['maxlength' => 16]) ?>
	  </div>
	</div>
	
	<div class="row">
	  <div class="col-sm-12">
	    <?= $form->field($model, 'address1')->textInput(['maxlength' => 150]) ?>
	  </div>
	</div>
	
	<div class="row">
	  <div class="col-sm-12">
	    <?= $form->field($model, 'address2')->textInput(['maxlength' => 150]) ?>
	  </div>
	</div>
	
	<div class="row">
	  <div class="col-sm-5">
	    <?= $form->field($model, 'city')->textInput(['maxlength' => 150]) ?>
	  </div>
	  <div class="col-sm-2">
	    <?= $form->field($model, 'state')->textInput(['maxlength' => 2]) ?>
	  </div>
	  <div class="col-sm-3">
	    <?= $form->field($model, 'zipcode')->textInput(['maxlength' => 10]) ?>
	  </div>
	  <div class="col-sm-2">
	    <?= $form->field($model, 'country')->textInput(['maxlength' => 2]) ?>
	  </div>
	</div>
	
	<div class="row">
	  <div class="col-sm-12">
	    
		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Confirm', ['class' => $model->isNewRecord ? 'btn btn-success btn-lg pull-right' : 'btn btn-primary btn-lg pull-right']) ?>
		</div>
		
	  </div>
	</div>

    <?php ActiveForm::end(); ?>

</div>
