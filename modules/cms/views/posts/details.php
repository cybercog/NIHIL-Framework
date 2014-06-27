<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\Content */

$this->title = 'uclemmer | CMS Posts Details';
$this->params['breadcrumbs'][] = ['label' => 'CMS', 'url' => '/cms'];
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => '/cms/posts'];
$this->params['breadcrumbs'][] = 'Details';
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

						<div class="cms-posts-view">
							<h1>CMS Posts View</h1>

							<p>
								<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
								<?= Html::a('Delete', ['delete', 'id' => $model->id], [
									'class' => 'btn btn-danger',
									'data' => [
										'confirm' => 'Are you sure you want to delete this item?',
										'method' => 'post',
									],
								]) ?>
							</p>

							<?= DetailView::widget([
								'model' => $model,
								'attributes' => [
									'id',
									'type',
									'author',
									'name',
									'slug',
									'date_created',
									'date_updated',
									'date_published',
									'content:ntext',
									'views',
									'date_lastview',
								],
							]) ?>
						</div>

					</div>
				</div>
			</div>
		</section>