<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\gow\models\search\BankDailyLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Bank Daily Log List';
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="bank-daily-log-list">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Bank Daily Log List') ?></h1>
								    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
				
					<p>
						<?= Html::a('Create Bank Daily Log', ['create'], ['class' => 'btn btn-success']) ?>
					</p>

									<?= GridView::widget([
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
        'columns' => [
							['class' => 'yii\grid\SerialColumn'],

				            'id',
            'bank_id',
            'date',
            'daily_stone',
            'daily_wood',
            // 'daily_food',
            // 'daily_ore',
            // 'daily_silver',
            // 'daily_total',
            // 'sum_stone',
            // 'sum_wood',
            // 'sum_food',
            // 'sum_ore',
            // 'sum_silver',
            // 'sum_total',

							['class' => 'yii\grid\ActionColumn'],
						],
					]); ?>
							</div>
		  </div>
		</div>
	  </section>
