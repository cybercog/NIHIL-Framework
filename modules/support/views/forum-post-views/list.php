<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\support\models\search\ForumPostViewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Forum Post View List';
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="forum-post-view-list">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Forum Post View List') ?></h1>
								    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
				
					<p>
						<?= Html::a('Create Forum Post View', ['create'], ['class' => 'btn btn-success']) ?>
					</p>

									<?= GridView::widget([
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
        'columns' => [
							['class' => 'yii\grid\SerialColumn'],

				            'id',
            'post_id',
            'timestamp',
            'ip_address',
            'user_agent',

							['class' => 'yii\grid\ActionColumn'],
						],
					]); ?>
							</div>
		  </div>
		</div>
	  </section>
