<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;

use yii\bootstrap\Modal;
//use kartik\widgets\ActiveForm;
//use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ac\models\search\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Register';
//$this->params['breadcrumbs'][] = array('label' => 'AC', 'url' => '/ac');
//$this->params['breadcrumbs'][] = array('label' => 'Users', 'url' => '/ac/users');
$this->params['breadcrumbs'][] = 'Register';
?>

		<section id="ac-users-login">
		  <div class="row">
		    <div class="col-sm-6 col-sm-offset-3" id="login-alerts">
			
			  <?php if (Yii::$app->session->hasFlash('success')) { ?>
  <div class="alert alert-success alert-dismissible alert-flash" id="flashMessage" role="alert">
	<div class="container">
	  <!--<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
	  <strong><i class="fa fa-check-square"></i> Success:</strong> <?= Yii::$app->session->getFlash('success'); ?>
	</div>
  </div>
  <?php }elseif (Yii::$app->session->hasFlash('warning')) { ?>
  <div class="alert alert-warning alert-dismissible alert-flash" id="flashMessage" role="alert">
	<div class="container">
	  <!--<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
	  <strong><i class="fa fa-exclamation-triangle"></i> Warning:</strong> <?= Yii::$app->session->getFlash('warning'); ?>
	</div>
  </div>
  <?php }elseif (Yii::$app->session->hasFlash('danger')) { ?>
  <div class="alert alert-danger alert-dismissible alert-flash" id="flashMessage" role="alert">
	<div class="container">
	  <!--<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
	  <strong><i class="fa fa-exclamation-triangle"></i> Error:</strong> <?= Yii::$app->session->getFlash('danger'); ?>
	</div>
  </div>
  <?php }elseif (Yii::$app->session->hasFlash('info')) { ?>
  <div class="alert alert-info alert-dismissible alert-flash" id="flashMessage" role="alert">
	<div class="container">
	  <!--<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
	  <strong><i class="fa fa-info-circle"></i> Info:</strong> <?= Yii::$app->session->getFlash('info'); ?>
	</div>
  </div>
  <?php } ?>

			
			</div>
		  </div>
		  <div class="row">
		    <div class="col-sm-6 col-sm-offset-3" id="login-main">
			
			  <div class="row">
			    <div class="col-sm-6"  id="login-cta">
				
					cta
				
				</div>
				<div class="col-sm-6" id="login-formarea">
				
					<h1>Sign Up</h1>
								
					<?php $form = ActiveForm::begin(); ?>
					
					<div class="row">
					  <div class="col-sm-12">
					    <?= $form->field($model, 'first_name')->textInput(['maxlength' => 100]) ?>
					  </div>
					</div>
					<div class="row">
					  <div class="col-sm-12">
					    <?= $form->field($model, 'last_name')->textInput(['maxlength' => 100]) ?>
					  </div>
					</div>
					<div class="row">
					  <div class="col-sm-12">
					    <?= $form->field($model, 'email')->textInput(['maxlength' => 150]) ?>
					  </div>
					</div>
					<div class="row">
					  <div class="col-sm-12">
					    <?= $form->field($model, 'username')->textInput(['maxlength' => 100]) ?>
					  </div>
					</div>
					<div class="row">
					  <div class="col-sm-12">
					    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 128]) ?>
					  </div>
					</div>
					<div class="row">
					  <div class="col-sm-12">
					    <?= $form->field($model, 'confirm')->passwordInput(['maxlength' => 128]) ?>
					  </div>
					</div>
					<div class="row">
					  <div class="col-sm-5">
						<?= $form->field($model, 'dob_month')->dropDownList($model->getMonthsDropdown(),['prompt'=>'']); ?>
					  </div>
					  <div class="col-sm-3">
					    <?= $form->field($model, 'dob_day')->dropDownList($model->getDaysDropdown(),['prompt'=>'']); ?>
					  </div>
					  <div class="col-sm-4">
					    <?= $form->field($model, 'dob_year')->dropDownList($model->getYearsDropdown(),['prompt'=>'']); ?>
					  </div>
					</div>
					
					<p>By clicking &quot;sign up&quot; below, you acknowledge that you have read and agree to the <a href="/legal/terms-of-service">Terms of Service</a>.</p>

					<div class="form-group">
						<?= Html::submitButton('sign up', ['class' => 'btn btn-success btn-lg']) ?>
						<a href="#" class="btn btn-link" disabled><i class="fa fa-lock"></i> Secure Server</a>
					</div>

					<?php ActiveForm::end(); ?>
				
				</div>
			  </div>
			  <div class="row" id="login-footer-legal">
			    <div class="col-sm-6" id="login-footer-legal-copyright">
				  Copyright &copy; 2010-<?php echo date("Y"); ?> The NIHIL Corporation.  All rights reserved.
				</div>
				<div class="col-sm-6" id="login-footer-legal-navigation">
				  <ul class="list-inline">
					<li><a href="/legal/privacy">Privacy</a></li>
					<li><a href="/support">Support</a></li>
					<li><a href="/ac/users/login">Login</a></li>
				  </ul>
				</div>
			  </div>
			
			</div>
		  </div>
		</section>