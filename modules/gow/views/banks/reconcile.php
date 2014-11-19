<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\gow\models\search\BankrSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Banks';
$this->params['breadcrumbs'][] = $this->title;
?>

			  <div class="row">
			    <div class="col-xs-12">
					<h1 class="page-header">Reconcile Accounts</h1>
					<p><strong>Step 1:</strong> Enter the current balance of the bank.</p>
				</div>
			  </div>
			  
			  <?php $form = ActiveForm::begin(); ?>
			  <div class="row">
			    <div class="col-sm-2">
				  <?= $form->field($model, 'stone')->textInput(['maxlength' => 100]) ?>
				</div>
				<div class="col-sm-2">
				  <?= $form->field($model, 'wood')->textInput(['maxlength' => 100]) ?>
				</div>
				<div class="col-sm-2">
				  <?= $form->field($model, 'food')->textInput(['maxlength' => 100]) ?>
				</div>
				<div class="col-sm-2">
				  <?= $form->field($model, 'ore')->textInput(['maxlength' => 100]) ?>
				</div>
				<div class="col-sm-2">
				  <?= $form->field($model, 'silver')->textInput(['maxlength' => 100]) ?>
				</div>
			  </div>
			  
			  <div class="row">
			    <div class="col-xs-12">
					<p><strong>Step 2:</strong> Select transactions for this period.</p>
				</div>
			  </div>
			  
			  <div class="row">
			    <div class="col-xs-12">
				
				  <div class="table-responsive">
					<?php
					  $columns = [
							[
								'class' => 'yii\grid\CheckboxColumn',
								// you may configure additional properties here
							],
							//'id',
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
			  
			  <div class="row">
			    <div class="col-xs-12">
					<p><strong>Step 3:</strong> Let the bank keep its rake.</p>
				</div>
			  </div>
			  
			  <div class="row">
			    <div class="col-sm-2">
				  <?= $form->field($model, 'stone')->textInput(['maxlength' => 100]) ?>
				</div>
				<div class="col-sm-2">
				  <?= $form->field($model, 'wood')->textInput(['maxlength' => 100]) ?>
				</div>
				<div class="col-sm-2">
				  <?= $form->field($model, 'food')->textInput(['maxlength' => 100]) ?>
				</div>
				<div class="col-sm-2">
				  <?= $form->field($model, 'ore')->textInput(['maxlength' => 100]) ?>
				</div>
				<div class="col-sm-2">
				  <?= $form->field($model, 'silver')->textInput(['maxlength' => 100]) ?>
				</div>
			  </div>
			  
			  <div class="row">
			    <div class="col-xs-12">
					<p><strong>Step 4:</strong> Does everything add up. Ideally, this should equal zero:</p>
				</div>
			  </div>
			  
			  <div class="row">
			    <div class="col-sm-2">
				  <div class="form-group field-reconcileform-stone required">
					<label class="control-label" for="reconcileform-stone">Stone</label>
					<input type="text" id="reconcileform-stone" class="form-control" name="ReconcileForm[tstone]" maxlength="100" disabled>
					<div class="help-block"></div>
				  </div>
  			    </div>
				<div class="col-sm-2">
				  <div class="form-group field-reconcileform-wood required">
					<label class="control-label" for="reconcileform-wood">Wood</label>
					<input type="text" id="reconcileform-wood" class="form-control" name="ReconcileForm[twood]" maxlength="100" disabled>
					<div class="help-block"></div>
				  </div>
				</div>
				<div class="col-sm-2">
				  <div class="form-group field-reconcileform-food required">
					<label class="control-label" for="reconcileform-food">Food</label>
					<input type="text" id="reconcileform-food" class="form-control" name="ReconcileForm[tfood]" maxlength="100" disabled>
					<div class="help-block"></div>
				  </div>
				</div>
				<div class="col-sm-2">
				  <div class="form-group field-reconcileform-ore required">
					<label class="control-label" for="reconcileform-ore">Ore</label>
					<input type="text" id="reconcileform-ore" class="form-control" name="ReconcileForm[tore]" maxlength="100" disabled>
					<div class="help-block"></div>
				  </div>
				</div>
				<div class="col-sm-2">
				  <div class="form-group field-reconcileform-silver required">
					<label class="control-label" for="reconcileform-silver">Silver</label>
					<input type="text" id="reconcileform-silver" class="form-control" name="ReconcileForm[tsilver]" maxlength="100" disabled>
					<div class="help-block"></div>
				  </div>
				</div>
			  </div>
			  
			  <?php ActiveForm::end(); ?>
							