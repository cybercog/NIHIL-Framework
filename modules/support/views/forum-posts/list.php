<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\support\models\search\ForumPostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'uclemmer | Support Forum Posts List';
$this->params['breadcrumbs'][] = ['label' => 'Support', 'url' => '/support'];
$this->params['breadcrumbs'][] = ['label' => 'Forum Posts', 'url' => '/ac/forum-posts'];
$this->params['breadcrumbs'][] = 'List';
?>

		<section id="site-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
		
						<?= Breadcrumbs::widget([
							'homeLink' => [
								'label' => 'Home',
								'template' => "<li><a href='\'><i class='fa fa-home'></i></a></li>\n",
							],
							'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
						]) ?>
			
					</div>
				</div>
			</div>
		</section>
		
		<section id="site-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">

						<div class="support-forumposts-list">
							<h1>Support Forum Posts List</h1>
							<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

							<p>
								<?= Html::a('Create Forum Post', ['create'], ['class' => 'btn btn-success']) ?>
							</p>

							<?= GridView::widget([
								'dataProvider' => $dataProvider,
								'filterModel' => $searchModel,
								'columns' => [
									['class' => 'yii\grid\SerialColumn'],

									//'id',
									'user_id',
									'thread_id',
									'title',
									'slug',
									// 'content:ntext',
									'views_count',
									'replies_count',
									'votes_up',
									'votes_down',
									// 'sticky',
									'date_created',
									// 'date_modified',
									// 'date_edited',
									// 'locked',
									// 'deleted',
									// 'accepted_answer',

									['class' => 'yii\grid\ActionColumn'],
								],
							]); ?>
						</div>

					</div>
				</div>
			</div>
		</section>