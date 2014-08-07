<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

use \app\modules\support\models\TicketType;
use \app\modules\support\models\TicketPriority;
use \app\modules\support\models\TicketStatus;
use \app\modules\support\models\TicketResolution;
use \app\modules\ac\models\Users;

$type = new TicketType;
$priority = new TicketPriority;
$status = new TicketStatus;
$resolution = new TicketResolution;
$user = new Users;

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
									[
										'attribute' => 'type',
										'label' => 'Type',
										'filter' => $type::dropdown(),
										'value' => function($model, $index, $dataColumn) use ($type) {
											$typeDropdown = $type::dropdown();
											return $typeDropdown[$model->type];
										},
									],
									[
										'attribute' => 'status',
										'label' => 'Status',
										'filter' => $status::dropdown(),
										'value' => function($model, $index, $dataColumn) use ($status) {
											$statusDropdown = $status::dropdown();
											return $statusDropdown[$model->status];
										},
									],
									[
										'attribute' => 'priority',
										'label' => 'Priority',
										'filter' => $priority::dropdown(),
										'value' => function($model, $index, $dataColumn) use ($priority) {
											$priorityDropdown = $priority::dropdown();
											return $priorityDropdown[$model->priority];
										},
									],
									'name',
									// 'slug',
									[
										'attribute' => 'reporter',
										'label' => 'Reporter',
										'filter' => $user::dropdown(),
										'value' => function($model, $index, $dataColumn) use ($user) {
											$reporterDropdown = $user::dropdown();
											return $reporterDropdown[$model->reporter];
										},
									],
									[
										'attribute' => 'assignee',
										'label' => 'Assignee',
										'filter' => $user::dropdown(),
										'value' => function($model, $index, $dataColumn) use ($user) {
											$assigneeDropdown = $user::dropdown();
											return $assigneeDropdown[$model->assignee];
										},
									],
									//'date_reported',
									// 'date_assigned',
									// 'date_edited',
									// 'date_estimated',
									// 'date_resolved',
									// 'time_estimated',
									// 'time_actual',
									[
										'attribute' => 'resolution',
										'label' => 'Resolution',
										'filter' => $resolution::dropdown(),
										'value' => function($model, $index, $dataColumn) use ($resolution) {
											$resolutionDropdown = $resolution::dropdown();
											return $resolutionDropdown[$model->resolution];
										},
									],
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