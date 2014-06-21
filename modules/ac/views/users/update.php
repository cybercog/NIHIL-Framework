<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\Users */

$this->title = 'uclemmer | AC Users Update' . ' ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'AC', 'url' => '/ac'];
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => '/ac/users'];
$this->params['breadcrumbs'][] = 'Update ' . $model->username;
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
					<div class="col-md-12">

						<div class="ac-users-update">

							<h1>AC Users Update: <?= Html::encode($model->username) ?></h1>

							<?= $this->render('_form', [
								'model' => $model,
							]) ?>

						</div>

					</div>
				</div>
			</div>
		</section>