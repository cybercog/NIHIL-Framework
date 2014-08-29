<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ac\models\search\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Register';
//$this->params['breadcrumbs'][] = array('label' => 'AC', 'url' => '/ac');
//$this->params['breadcrumbs'][] = array('label' => 'Users', 'url' => '/ac/users');
$this->params['breadcrumbs'][] = 'Register';
?>
		<!--
		<section id="site-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
		
						<?= Breadcrumbs::widget([
							'homeLink' => [
								'label' => 'Home',
								'template' => "<li><a href='\'><i class='fa fa-home'></i></a></li>\n",
							],
							'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
						]) ?>
			
					</div>
				</div>
			</div>
		</section>
		-->
		
		<section id="site-content">
			<div class="container">
				<div class="row">
					<div class="col-md-5">

						<div class="ac-users-register">

							<h1>Register</h1>
							
							<?php $form = ActiveForm::begin(); ?>

							<?= $form->field($model, 'username')->textInput(['maxlength' => 100]) ?>

							<?= $form->field($model, 'password')->passwordInput(['maxlength' => 128]) ?>
							
							<?= $form->field($model, 'confirm')->passwordInput(['maxlength' => 128]) ?>
							
							<?= $form->field($model, 'email')->textInput(['maxlength' => 150]) ?>
							
							<?= $form->field($model, 'nickname')->textInput(['maxlength' => 100]) ?>
							
							<div class="row">
							<div class="col-sm-4">
							
							<?= $form->field($model, 'dob_month')->dropDownList($model->monthsDropdown(), ['prompt'=>''] ); ?>
							
							</div>
							<div class="col-sm-4">
							
							<?= $form->field($model, 'dob_day')->dropDownList($model->daysDropdown(), ['prompt'=>''] ); ?>
							
							</div>
							<div class="col-sm-4">
							
							<?= $form->field($model, 'dob_year')->dropDownList($model->yearsDropdown(), ['prompt'=>''] ); ?>
							
							</div>
							</div>

							<div class="form-group">
								<?= Html::submitButton('register', ['class' => 'btn btn-success btn-lg']) ?>
							</div>

							<?php ActiveForm::end(); ?>

						</div>

					</div>
				</div>
				<div class="row">
					<div class="col-md-5">

						<div class="btn-aclinks">
							<a href="/login">login</a> | 
							<a href="/reset">reset account</a>
						</div>

					</div>
				</div>
			</div>
		</section>