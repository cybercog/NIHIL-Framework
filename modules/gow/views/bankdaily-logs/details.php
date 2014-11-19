<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\gow\models\BankDailyLog */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - Details: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bank Daily Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="bank-daily-log-details">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Bank Daily Log Details') ?></h1>
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
            'bank_id',
            'date',
            'daily_stone',
            'daily_wood',
            'daily_food',
            'daily_ore',
            'daily_silver',
            'daily_total',
            'sum_stone',
            'sum_wood',
            'sum_food',
            'sum_ore',
            'sum_silver',
            'sum_total',
				],
			]) ?>
			</div>
		  </div>
		</div>
	  </section>