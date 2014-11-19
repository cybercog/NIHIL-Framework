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
			<?php if(\Yii::$app->user->isGuest) { ?>
			<div class="container">
			<?php } ?>
			
			  <div class="row">
			    <?php if(!\Yii::$app->user->isGuest) { ?>
				<div class="col-sm-6">
				<?php }else{ ?>
			    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				<?php } ?>
					<h1 class="page-header">Contact Support</h1>
					<p>Fill out the following form, or email us directly, with as much detail as possible to get started today.</p>
				</div>
			  </div>
			  
			  <div class="row">
			    <?php if(!\Yii::$app->user->isGuest) { ?>
				<div class="col-sm-6">
				<?php }else{ ?>
			    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				<?php } ?>
					
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
							'captchaAction' => 'captcha',
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
			  
			<?php if(\Yii::$app->user->isGuest) { ?>
			<div class="row">
					<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 text-center">

						<div class="btn-aclinks">
							<a href="/login">login</a> | 
							<a href="/register">register</a> | 
							<a href="/reset">reset account</a>
						</div>

					</div>
				</div>
			</div>
			<?php } ?>