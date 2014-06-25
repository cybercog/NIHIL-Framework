<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ac\models\search\EmailChangesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'uclemmer | AC Email Changes List';
$this->params['breadcrumbs'][] = ['label' => 'AC', 'url' => '/ac'];
$this->params['breadcrumbs'][] = ['label' => 'Email Changes', 'url' => '/ac/email-changes'];
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

						<div class="ac-emailchanges-list">
							<h1>AC Email Changes List</h1>
							<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

							<p>
								<?= Html::a('Create Email Changes', ['create'], ['class' => 'btn btn-success']) ?>
							</p>

							<?= GridView::widget([
								'dataProvider' => $dataProvider,
								'filterModel' => $searchModel,
								'columns' => [
									['class' => 'yii\grid\SerialColumn'],

									'id',
									'user_id',
									'email:email',
									'date_created',
									'ip_address',
									// 'user_agent',

									['class' => 'yii\grid\ActionColumn'],
								],
							]); ?>
						</div>

					</div>
				</div>
			</div>
		</section>