<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\grid\GridView;

/* @var $this yii\web\View */

$this->title = 'uclemmer | Ecom Invoice Items List';
$this->params['breadcrumbs'][] = ['label' => 'Ecom', 'url' => '/ecom'];
$this->params['breadcrumbs'][] = ['label' => 'Invoice Items', 'url' => '/ecom/invoice-items'];
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

						<div class="ecom-invoiceitems-list">
							<h1>Ecom Invoice Items List</h1>
							<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

							<p>
								<?= Html::a('Create Invoice Item', ['create'], ['class' => 'btn btn-success']) ?>
							</p>

							<?= GridView::widget([
								'dataProvider' => $dataProvider,
								'filterModel' => $searchModel,
								'columns' => [
									['class' => 'yii\grid\SerialColumn'],

									'id',
									'invoice_id',
									'product_id',
									'name',
									'quantity',
									// 'unit_price',
									// 'total',
									// 'taxed',
									// 'description:ntext',
									// 'details:ntext',

									['class' => 'yii\grid\ActionColumn'],
								],
							]); ?>
						</div>

					</div>
				</div>
			</div>
		</section>