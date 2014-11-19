<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ac\models\search\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Verify Account';
$this->params['breadcrumbs'][] = array('label' => 'AC', 'url' => '/ac');
$this->params['breadcrumbs'][] = array('label' => 'Users', 'url' => '/ac/users');
$this->params['breadcrumbs'][] = 'Verify';
?>

		<section id="ac-users-verify">
			<div class="container">
				<div class="row">
					<div class="col-md-5">

						<div class="ac-users-verify">

							<h1>Verify Account</h1>
							
							<?php $form = ActiveForm::begin(); ?>

							<?= $form->field($model, 'code')->textInput(['maxlength' => 100]) ?>

							<div class="form-group">
								<?= Html::submitButton('verify email', ['class' => 'btn btn-success btn-lg']) ?>
							</div>

							<?php ActiveForm::end(); ?>

						</div>

					</div>
				</div>
			</div>
		</section>