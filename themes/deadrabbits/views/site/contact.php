<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>

			  <div class="row">
			    <div class="col-xs-12">
					<h1 class="page-header">Contact Support</h1>
					<p>Fill out the following form, or email us directly, with as much detail as possible to get started today.</p>
				</div>
			  </div>
			  
			  <div class="row">
			    <div class="col-sm-6">
					
				  <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
					<div class="row">
					  <div class="col-sm-6">
						<?= $form->field($model, 'name') ?>
					  </div>
					  <div class="col-sm-6">
						<?= $form->field($model, 'email') ?>
					  </div>
					</div>
					<div class="row">
					  <div class="col-sm-12">
						<?= $form->field($model, 'subject') ?>
					  </div>
					</div>
					<div class="row">
					  <div class="col-sm-12">
						<?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>
					  </div>
					</div>
					<div class="row">
					  <div class="col-sm-12">
						<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
							'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
						]) ?>
					  </div>
					</div>
					<div class="row">
					  <div class="col-sm-12">
						<?= Html::submitButton('Send Message', ['class' => 'btn btn-primary pull-right', 'name' => 'contact-button']) ?>
					  </div>
					</div>
				  <?php ActiveForm::end(); ?>  
				
				</div>
			  </div>