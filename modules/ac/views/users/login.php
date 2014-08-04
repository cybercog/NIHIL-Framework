<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ac\models\search\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'uclemmer | Login';
//$this->params['breadcrumbs'][] = array('label' => 'AC', 'url' => '/ac');
//$this->params['breadcrumbs'][] = array('label' => 'Users', 'url' => '/ac/users');
$this->params['breadcrumbs'][] = 'Login';
?>

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
		
		<section id="site-content">
			<div class="container">
				<div class="row">
					<div class="col-md-5">

						<div class="ac-users-login">

							<h1>Login</h1>
							
							<?php $form = ActiveForm::begin(); ?>

							<?= $form->field($model, 'username')->textInput(['maxlength' => 100]) ?>

							<?= $form->field($model, 'password')->passwordInput(['maxlength' => 128]) ?>
							
							<?= $form->field($model, 'rememberMe')->checkbox() ?>

							<div class="form-group">
								<?= Html::submitButton('Login', ['class' => 'btn btn-default']) ?>
							</div>

							<?php ActiveForm::end(); ?>

						</div>

					</div>
				</div>
				<div class="row">
					<div class="col-md-5">

						<a href="/register">Register</a> | 
						<a href="/reset">Reset Account</a>

					</div>
				</div>
			</div>
		</section>