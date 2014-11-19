<?php

use yii\helpers\Html;
use yii\grid\GridView;

use \app\modules\ac\models\User;

$user = new User;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\cms\models\search\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Post List';
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="post-list">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Post List') ?></h1>
								    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
				
					<p>
						<?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
					</p>

					<?= GridView::widget([
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
						'columns' => [
							['class' => 'yii\grid\SerialColumn'],
				            //'id',
							'name',
							[
								'attribute' => 'author',
								'label' => 'Author',
								'filter' => $user::dropdown(),
								'value' => function($model, $index, $dataColumn) use ($user) {
									$userDropdown = $user::dropdown();
									return $userDropdown[$model->author];
								},
							],
							//'slug',
							//'description:ntext',
							//'date_created',
							// 'date_updated',
							'date_published',
							// 'content:ntext',
							//'votes_up',
							//'votes_down',
							'date_lastview',
							'views',
							['class' => 'yii\grid\ActionColumn'],
						],
					]); ?>
							</div>
		  </div>
		</div>
	  </section>
