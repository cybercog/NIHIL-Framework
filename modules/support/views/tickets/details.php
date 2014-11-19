<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\support\models\Ticket */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - Details: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="ticket-details">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Ticket Details') ?></h1>
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
            'ref_code',
            'parent',
            'type',
            'status',
            'priority',
            'name',
            'slug',
            'reporter',
            'assignee',
            'date_reported',
            'date_assigned',
            'date_edited',
            'date_estimated',
            'date_resolved',
            'time_estimated',
            'time_actual',
            'resolution',
            'message:ntext',
            'details:ntext',
				],
			]) ?>
			</div>
		  </div>
		</div>
	  </section>