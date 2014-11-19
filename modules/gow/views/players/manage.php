<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\gow\models\search\PlayerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Players';
$this->params['breadcrumbs'][] = $this->title;
?>

			  <div class="row">
			    <div class="col-xs-12">
					<h1 class="page-header">Manage Players</h1>
				</div>
			  </div>
			  
			  <div class="row">
			    <div class="col-xs-12">
					
					<div class="table-responsive">
					<?php
					  $columns = [
							['class' => 'yii\grid\SerialColumn'],
							//'id',
							//'user_id',
							//'alliance_id',
							'rank',
							'name',
							//'date_updated',
							[
								'attribute' => 'date_updated',
								'format' => 'raw',
								'value' => function ($model) {                      
										if($model->date_updated) {
											return date("H:i:s m/d/Y", strtotime($model->date_updated));
										}else{
											return 'N/A';
										}
								},
							],
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
							//'date_joined',
							//['class' => 'yii\grid\ActionColumn'],
						];
						if(\Yii::$app->user->can('rank-iv')) {
							$columns[] = ['class' => 'yii\grid\ActionColumn'];
						}
					?>
					<?= GridView::widget(['dataProvider' => $dataProvider, 'filterModel' => $searchModel, 'columns' => $columns]); ?>
				  </div>
				  
				</div>
			  </div>