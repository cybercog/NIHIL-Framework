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

		<!--<section id="ac-users-signup" class="eeeeee-n-ffffff">-->
		<section id="ac-users-login">
		  <div class="container">
		  <div class="row">
		    <div class="col-sm-12" id="login-main">
			
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
			
			</div>
		  </div>
		  </div>
		</section>