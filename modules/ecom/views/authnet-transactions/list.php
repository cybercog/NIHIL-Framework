<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\grid\GridView;

/* @var $this yii\web\View */

$this->title = 'uclemmer | Ecom Authnet Transactions List';
$this->params['breadcrumbs'][] = ['label' => 'Ecom', 'url' => '/ecom'];
$this->params['breadcrumbs'][] = ['label' => 'Authnet Transactions', 'url' => '/ecom/authnet-transactions'];
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

						<div class="ecom-authnettransactions-list">
							<h1>Ecom Authnet Transactions List</h1>
							<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

							<p>
								<?= Html::a('Create Authnet Transaction', ['create'], ['class' => 'btn btn-success']) ?>
							</p>

							<?= GridView::widget([
								'dataProvider' => $dataProvider,
								'filterModel' => $searchModel,
								'columns' => [
									['class' => 'yii\grid\SerialColumn'],

									'id',
									'ip_address',
									'timestamp',
									'response_code',
									'response_text',
									// 'authorization_type:ntext',
									// 'result',
									// 'transaction_id',
									// 'data_sent:ntext',
									// 'data_received:ntext',
									// 'session_id',
									// 'details:ntext',

									['class' => 'yii\grid\ActionColumn'],
								],
							]); ?>
						</div>

					</div>
				</div>
			</div>
		</section>
