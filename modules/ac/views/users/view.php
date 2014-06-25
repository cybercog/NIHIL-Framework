<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\Users */

$this->title = 'uclemmer | AC Users View ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'AC', 'url' => '/ac'];
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => '/ac/users'];
$this->params['breadcrumbs'][] = 'View ' . $model->username;
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

						<div class="ac-users-view">

							<h1>AC Users View: <?= Html::encode($model->username) ?></h1>

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
									'username',
									'email:email',
									'password',
									'nickname',
									'birthday',
									'credit',
									'auth_key',
									'date_created',
									'date_last_login',
									'last_login_ip',
									'login_attempts',
									'details:ntext',
								],
							]) ?>

						</div>

					</div>
				</div>
			</div>
		</section>