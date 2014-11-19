<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

use \app\modules\support\models\TicketType;
use \app\modules\support\models\TicketPriority;
use \app\modules\support\models\TicketStatus;
use \app\modules\support\models\TicketResolution;
use \app\modules\ac\models\User;

$type = new TicketType;
$priority = new TicketPriority;
$status = new TicketStatus;
$resolution = new TicketResolution;
$user = new User;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\support\models\search\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Ticket List';
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="ticket-list">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Tickets List') ?></h1>
								    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
				
					<p>
						<?= Html::a('Create Ticket', ['create'], ['class' => 'btn btn-success']) ?>
					</p>
									<?php Pjax::begin(); ?>
									<?= 
									  
									  GridView::widget([
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
											// 'date_reported',
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
									  ]);?>
									  <?php Pjax::end(); ?>
							</div>
		  </div>
		</div>
	  </section>
