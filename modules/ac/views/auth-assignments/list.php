<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ac\models\search\AuthAssignmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Auth Assignment List';
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="auth-assignment-list">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Auth Assignment List') ?></h1>
								    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
				
					<p>
						<?= Html::a('Create Auth Assignment', ['create'], ['class' => 'btn btn-success']) ?>
					</p>

									<?= GridView::widget([
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
        'columns' => [
							['class' => 'yii\grid\SerialColumn'],

				            'item_name',
            'user_id',
            'created_at',

							['class' => 'yii\grid\ActionColumn'],
						],
					]); ?>
							</div>
		  </div>
		</div>
	  </section>
