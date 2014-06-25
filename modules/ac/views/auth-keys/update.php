<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\AuthKeys */

$this->title = 'uclemmer | AC Auth Keys Update';
$this->params['breadcrumbs'][] = ['label' => 'AC', 'url' => '/ac'];
$this->params['breadcrumbs'][] = ['label' => 'Auth Keys', 'url' => '/ac/auth-keys'];
$this->params['breadcrumbs'][] = 'Update ' . $model->id;
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
					<div class="col-md-12">

						<div class="ac-authkeys-update">
							<h1>AC Auth Keys Update</h1>

							<?= $this->render('_form', [
								'model' => $model,
							]) ?>
						</div>

					</div>
				</div>
			</div>
		</section>