<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\PageHistory */

$this->title = 'uclemmer | CMS Page Histories View';
$this->params['breadcrumbs'][] = ['label' => 'CMS', 'url' => '/cms'];
$this->params['breadcrumbs'][] = ['label' => 'Page Histories', 'url' => '/cms/page-histories'];
$this->params['breadcrumbs'][] = 'View';
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

						<div class="cms-pagehistories-view">
							<h1>CMS Page Histories View</h1>

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
									'page_id',
									'author',
									'name',
									'slug',
									'date_created',
									'content:ntext',
								],
							]) ?>
						</div>

					</div>
				</div>
			</div>
		</section>