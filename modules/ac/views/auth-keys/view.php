<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\AuthKeys */

$this->title = 'uclemmer | AC Auth Keys View ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'AC', 'url' => '/ac'];
$this->params['breadcrumbs'][] = ['label' => 'Auth Keys', 'url' => '/ac/auth-keys'];
$this->params['breadcrumbs'][] = 'View ' . $model->id;
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

						<div class="ac-authkeys-view">

							<h1><?= Html::encode($this->title) ?></h1>

							<p>
								<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
								<?= Html::a('Delete', ['delete', 'id' => $model->id], [
									'class' => 'btn btn-danger',
									'data' => [
										'confirm' => 'Are you sure you want to delete this item?',
										'method' => 'post',
									],
								]) ?>
							</p>

							<?= DetailView::widget([
								'model' => $model,
								'attributes' => [
									'id',
									'user_id',
									'type',
									'key',
									'date_created',
									'date_expires',
									'date_used',
								],
							]) ?>

						</div>

					</div>
				</div>
			</div>
		</section>