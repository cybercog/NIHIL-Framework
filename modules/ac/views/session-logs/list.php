<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ac\models\search\SessionLogsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'uclemmer | AC Session Logs List';
$this->params['breadcrumbs'][] = ['label' => 'AC', 'url' => '/ac'];
$this->params['breadcrumbs'][] = ['label' => 'Session Logs', 'url' => '/ac/session-logs'];
$this->params['breadcrumbs'][] = 'List';
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

						<div class="ac-sessionlogs-list">
							<h1>AC Session Logs List</h1>
							<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

							<p>
								<?= Html::a('Create Session Logs', ['create'], ['class' => 'btn btn-success']) ?>
							</p>

							<?= GridView::widget([
								'dataProvider' => $dataProvider,
								'filterModel' => $searchModel,
								'columns' => [
									['class' => 'yii\grid\SerialColumn'],

									'id',
									'user_id',
									'timestamp',
									'label',
									'description:ntext',
									// 'ip_address',
									// 'user_agent:ntext',

									['class' => 'yii\grid\ActionColumn'],
								],
							]); ?>

						</div>
						</div>

					</div>
				</div>
			</div>
		</section>