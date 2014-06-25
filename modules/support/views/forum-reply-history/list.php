<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\support\models\search\ForumReplyHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'uclemmer | Support Forum Reply Histories List';
$this->params['breadcrumbs'][] = ['label' => 'Support', 'url' => '/support'];
$this->params['breadcrumbs'][] = ['label' => 'Forum Reply Histories', 'url' => '/ac/forum-reply-histories'];
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

						<div class="support-forumreplyhistories-list">
							<h1>Support Forum Reply Histories List</h1>
							<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

							<p>
								<?= Html::a('Create Forum Reply History', ['create'], ['class' => 'btn btn-success']) ?>
							</p>

							<?= GridView::widget([
								'dataProvider' => $dataProvider,
								'filterModel' => $searchModel,
								'columns' => [
									['class' => 'yii\grid\SerialColumn'],

									//'id',
									'reply_id',
									'user_id',
									'date_created',
									'content:ntext',

									['class' => 'yii\grid\ActionColumn'],
								],
							]); ?>
						</div>

					</div>
				</div>
			</div>
		</section>