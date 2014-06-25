<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ac\models\search\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'uclemmer | AC Users Reset';
$this->params['breadcrumbs'][] = array('label' => 'AC', 'url' => '/ac');
$this->params['breadcrumbs'][] = array('label' => 'Users', 'url' => '/ac/users');
$this->params['breadcrumbs'][] = 'Reset';
?>

		<section id="site-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
		
						<?= Breadcrumbs::widget([
							'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
						]) ?>
			
					</div>
				</div>
			</div>
		</section>
		
		<section id="site-content">
			<div class="container">
				<div class="row">
					<div class="col-md-5">

						<div class="ac-users-reset">
						
							<h1>AC Users Reset</h1>

							<?php $form = ActiveForm::begin(); ?>

							<?= $form->field($model, 'email')->textInput(['maxlength' => 150]) ?>

							<div class="form-group">
								<?= Html::submitButton('Reset Account', ['class' => 'btn btn-primary']) ?>
							</div>

							<?php ActiveForm::end(); ?>

						</div>

					</div>
				</div>
				<div class="row">
					<div class="col-md-5">

						<a href="/ac/users/login">Login</a> | 
						<a href="/ac/users/register">Register</a>

					</div>
				</div>
			</div>
		</section>