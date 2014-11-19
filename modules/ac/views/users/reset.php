<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ac\models\search\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Account Reset';
//$this->params['breadcrumbs'][] = array('label' => 'AC', 'url' => '/ac');
//$this->params['breadcrumbs'][] = array('label' => 'Users', 'url' => '/ac/users');
$this->params['breadcrumbs'][] = 'Account Reset';
?>
		
		<section id="ac-users-reset">
			<div class="container">
				<div class="row">
					<div class="col-md-5">

						<div class="ac-users-reset">
						
							<h1>Account Reset</h1>

							<?php $form = ActiveForm::begin(); ?>

							<?= $form->field($model, 'email')->textInput(['maxlength' => 150]) ?>

							<div class="form-group">
								<?= Html::submitButton('reset account', ['class' => 'btn btn-success btn-lg']) ?>
							</div>

							<?php ActiveForm::end(); ?>

						</div>

					</div>
				</div>
				<div class="row">
					<div class="col-md-5">

						<div class="btn-aclinks">
							<a href="/login">login</a> | 
							<a href="/register">register</a>
						</div>

					</div>
				</div>
			</div>
		</section>