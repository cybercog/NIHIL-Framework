<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Unsubscribe';
//$this->params['breadcrumbs'][] = ['label' => 'PDA', 'url' => '/pda'];
//$this->params['breadcrumbs'][] = ['label' => 'Mailing Lists', 'url' => '/mailing-lists'];
$this->params['breadcrumbs'][] = 'Unsubscribe';
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

						<div class="ecom-default-index">
							<h1>Unsubscribe</h1>
							
						</div>
						
						
						<?php $form = ActiveForm::begin([
							'id' => 'pda-unsubscribe-form',
						]); ?>
							
							<div class="row">
								<div class="col-md-12">
									<?= $form->field($model, 'email') ?>
								</div>
							</div>

							<?= Html::submitButton('Unsubscribe', ['class' => 'btn btn-success btn-lg pull-right']) ?>

							<?php ActiveForm::end(); ?>

					</div>
				</div>
			</div>
		</section>