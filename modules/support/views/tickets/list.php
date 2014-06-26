<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\support\models\search\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'uclemmer | Support Tickets List';
$this->params['breadcrumbs'][] = ['label' => 'Support', 'url' => '/support'];
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => '/ac/tickets'];
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

						<div class="support-tickets-list">
							<h1>Support Tickets List</h1>
							<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

							<p>
								<?= Html::a('Create Ticket', ['create'], ['class' => 'btn btn-success']) ?>
							</p>

							<?= GridView::widget([
								'dataProvider' => $dataProvider,
								'filterModel' => $searchModel,
								'columns' => [
									['class' => 'yii\grid\SerialColumn'],

									//'id',
									//'ref_code',
									//'parent',
									'type',
									'status',
									'priority',
									'name',
									// 'slug',
									'reporter',
									'assignee',
									//'date_reported',
									// 'date_assigned',
									// 'date_edited',
									// 'date_estimated',
									// 'date_resolved',
									// 'time_estimated',
									// 'time_actual',
									'resolution',
									// 'message:ntext',
									// 'details:ntext',

									['class' => 'yii\grid\ActionColumn'],
								],
							]); ?>
						</div>

					</div>
				</div>
			</div>
		</section>