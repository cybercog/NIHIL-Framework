<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ac\models\search\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'uclemmer | AC Users List';
$this->params['breadcrumbs'][] = ['label' => 'AC', 'url' => '/ac'];
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => '/ac/users'];
$this->params['breadcrumbs'][] = 'List';
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

						<div class="ac-users-list">

							<h1>AC Users List</h1>
							<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

							<p>
								<?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ?>
							</p>

							<?= GridView::widget([
								'dataProvider' => $dataProvider,
								'filterModel' => $searchModel,
								'columns' => [
									['class' => 'yii\grid\SerialColumn'],

									//'id',
									'username',
									'email:email',
									//'password',
									'nickname',
									// 'birthday',
									// 'credit',
									// 'auth_key',
									'date_created',
									'date_last_login',
									// 'last_login_ip',
									// 'login_attempts',
									// 'details:ntext',

									['class' => 'yii\grid\ActionColumn'],
								],
							]); ?>

						</div>

					</div>
				</div>
			</div>
		</section>