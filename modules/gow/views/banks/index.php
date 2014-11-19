<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\gow\models\search\BankrSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Banks';
$this->params['breadcrumbs'][] = $this->title;
?>

			  <div class="row">
			    <div class="col-xs-12">
					<h1 class="page-header">Bank Overview</h1>
				</div>
			  </div>
			  
			  <div class="row">
			    <div class="col-xs-12">
					
				  <div class="row">
					<div class="col-sm-4">
					
							<script type="text/javascript">
							  google.load("visualization", "1", {packages:["corechart"]});
							  google.setOnLoadCallback(drawChart);
							  function drawChart() {
								var data = google.visualization.arrayToDataTable([
								  ['Resource', 'Total'],
								  ['Stone', <?php echo $bank->stone; ?>],
								  ['Wood', <?php echo $bank->wood; ?>],
								  ['Food', <?php echo $bank->food; ?>],
								  ['Ore', <?php echo $bank->ore; ?>],
								  ['Silver', <?php echo $bank->silver; ?>]
								]);

								var options = {
								  legend:{position:'none'},
								  pieHole: 0.4,
								};

								var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
								chart.draw(data, options);
							  }
							</script>
						  <div id="donutchart" style="width: 100%; min-height: 500px;"></div>
					  
					</div>
					<div class="col-sm-8">
					  
					  <div class="row">
						<div class="col-xs-12">
							<script type="text/javascript">
							  google.load("visualization", "1", {packages:["corechart"]});
							  google.setOnLoadCallback(drawChart);
							  function drawChart() {
								var data = google.visualization.arrayToDataTable([
								  ['Date', 'Stone', 'Wood', 'Food', 'Ore', 'Silver'],
								  <?php foreach($bank->bankDailyLogs as $log) { ?>
								  ['<?php echo date("m/d/Y", strtotime($log->date)); ?>', <?php echo $log->daily_stone; ?>, <?php echo $log->daily_wood; ?>, <?php echo $log->daily_food; ?> , <?php echo $log->daily_ore; ?>, <?php echo $log->daily_silver; ?>],
								  <?php } ?>
								]);

								var options = {
								  legend:{position:'none'},
								  hAxis: { titleTextStyle: {color: '#333'}},
								  vAxis: {minValue: 0}
								};

								var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
								chart.draw(data, options);
							  }
							</script>
							<div id="chart_div" style="width: 100%; min-height: 500px;"></div>
						</div>
					  </div>
					
					</div>
				  </div>
				  
				</div>
			  </div>
			  
			  <div class="row">
			    <div class="col-sm-2 col-sm-offset-1 text-center stone-dblock">
				  <h1><?php echo number_format($bank->stone, 0, ".", ","); ?></h1>
				  <h2>Stone</h2>
				</div>
				<div class="col-sm-2 text-center wood-dblock">
				  <h1><?php echo number_format($bank->wood, 0, ".", ","); ?></h1>
				  <h2>Wood</h2>
				</div>
				<div class="col-sm-2 text-center food-dblock">
				  <h1><?php echo number_format($bank->food, 0, ".", ","); ?></h1>
				  <h2>Food</h2>
				</div>
				<div class="col-sm-2 text-center ore-dblock">
				  <h1><?php echo number_format($bank->ore, 0, ".", ","); ?></h1>
				  <h2>Ore</h2>
				</div>
				<div class="col-sm-2 text-center silver-dblock">
				  <h1><?php echo number_format($bank->silver, 0, ".", ","); ?></h1>
				  <h2>Silver</h2>
				</div>
			  </div>
			  
			  <div class="row">
			    <div class="col-xs-12">
					<h1 class="page-header">Transactions Logs</h1>
				</div>
			  </div>
			  
			  <div class="row">
			    <div class="col-xs-12">
					
					<div class="table-responsive">
					<?php
					  $columns = [
							'id',
							// 'timestamp',
							[
								'attribute' => 'timestamp',
								'format' => 'raw',
								'value' => function ($model) {                      
									return date("H:i:s m/d/Y", strtotime($model->timestamp));	
								},
							],
							//'reconciled',
							//'bank_id',
							//'player_id',
							[
								'attribute' => 'sending_player',
								'format' => 'raw',
								'value' => function ($model) {                      
									return $model->sendingPlayer->name;	
								},
							],
							//[
							//	'attribute' => 'receiving_player',
							//	'format' => 'raw',
							//	'value' => function ($model) {                      
							//		return $model->receivingPlayer->name;	
							//	},
							//],
							//'stone',
							[
								'attribute' => 'stone',
								'format' => 'raw',
								'value' => function ($model) {                      
									return '<span class="stone-text">' . number_format($model->stone, 0) . '</span>';	
								},
							],
							//'wood',
							[
								'attribute' => 'wood',
								'format' => 'raw',
								'value' => function ($model) {                      
									return '<span class="wood-text">' . number_format($model->wood, 0) . '</span>';	
								},
							],
							//'food',
							[
								'attribute' => 'food',
								'format' => 'raw',
								'value' => function ($model) {                      
									return '<span class="food-text">' . number_format($model->food, 0) . '</span>';	
								},
							],
							//'ore',
							[
								'attribute' => 'ore',
								'format' => 'raw',
								'value' => function ($model) {                      
									return '<span class="ore-text">' . number_format($model->ore, 0) . '</span>';	
								},
							],
							//'silver',
							[
								'attribute' => 'silver',
								'format' => 'raw',
								'value' => function ($model) {                      
									return '<span class="silver-text">' . number_format($model->silver, 0) . '</span>';	
								},
							],
							// 'notes:ntext',
						];
						if(\Yii::$app->user->can('banker')) {
							$columns[] = ['class' => 'yii\grid\ActionColumn'];
						}
					?>
					<?= GridView::widget([
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
						'columns' => $columns,
					]); ?>
				  </div>
				  
				</div>
			  </div>