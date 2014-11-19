<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\support\models\search\ForumThreadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Forum Thread List';
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="forum-thread-list">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Forum Thread List') ?></h1>
								    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
				
					<p>
						<?= Html::a('Create Forum Thread', ['create'], ['class' => 'btn btn-success']) ?>
					</p>

									<?= GridView::widget([
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
        'columns' => [
							['class' => 'yii\grid\SerialColumn'],

				            'id',
            'parent',
            'forum_id',
            'name',
            'slug',
            // 'posts_count',

							['class' => 'yii\grid\ActionColumn'],
						],
					]); ?>
							</div>
		  </div>
		</div>
	  </section>
