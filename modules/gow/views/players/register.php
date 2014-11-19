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
		
		<section id="ac-users-register">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">

						<div class="ac-users-register">

							<h2 class="page-header text-center">Out of Morbid Curiosity</h2>
							
						  <?php if (Yii::$app->session->hasFlash('success')) { ?>
						  <div class="alert alert-success alert-dismissible alert-flash" id="flashMessage" role="alert">
							  <!--<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
							  <strong><i class="fa fa-check-square"></i> Success:</strong> <?= Yii::$app->session->getFlash('success'); ?>
						  </div>
						  <?php }elseif (Yii::$app->session->hasFlash('warning')) { ?>
						  <div class="alert alert-warning alert-dismissible alert-flash" id="flashMessage" role="alert">
							  <!--<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
							  <strong><i class="fa fa-exclamation-triangle"></i> Warning:</strong> <?= Yii::$app->session->getFlash('warning'); ?>
						  </div>
						  <?php }elseif (Yii::$app->session->hasFlash('danger')) { ?>
						  <div class="alert alert-danger alert-dismissible alert-flash" id="flashMessage" role="alert">
							  <!--<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
							  <strong><i class="fa fa-exclamation-triangle"></i> Error:</strong> <?= Yii::$app->session->getFlash('danger'); ?>
						  </div>
						  <?php }elseif (Yii::$app->session->hasFlash('info')) { ?>
						  <div class="alert alert-info alert-dismissible alert-flash" id="flashMessage" role="alert">
							  <!--<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
							  <strong><i class="fa fa-info-circle"></i> Info:</strong> <?= Yii::$app->session->getFlash('info'); ?>
						  </div>
						  <?php } ?>
							
							<?php $form = ActiveForm::begin(); ?>

							<?= $form->field($model, 'username')->textInput(['maxlength' => 100]) ?>

							<?= $form->field($model, 'password')->passwordInput(['maxlength' => 128]) ?>
							
							<?= $form->field($model, 'confirm')->passwordInput(['maxlength' => 128]) ?>
							
							<?= $form->field($model, 'email')->textInput(['maxlength' => 150]) ?>
							
							<?= $form->field($model, 'nickname')->textInput(['maxlength' => 100]) ?>
							
							<?= $form->field($model, 'birthday')->textInput(['maxlength' => 100]) ?>

							<div class="form-group">
								<?= Html::submitButton('register', ['class' => 'btn btn-success btn-lg btn-block']) ?>
							</div>

							<?php ActiveForm::end(); ?>

						</div>

					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 text-center">

						<div class="btn-aclinks">
							<a href="/login">login</a> | 
							<a href="/reset">reset account</a> | 
							<a href="/contact">contact</a>
						</div>

					</div>
				</div>
			</div>
		</section>