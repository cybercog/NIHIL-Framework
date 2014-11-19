<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ecom\models\search\InvoiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Invoice List';
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="invoice-list">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Invoice List') ?></h1>
								    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
				
					<p>
						<?= Html::a('Create Invoice', ['create'], ['class' => 'btn btn-success']) ?>
					</p>

									<?= GridView::widget([
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
							'columns' => [
								['class' => 'yii\grid\SerialColumn'],
								//'id',
								//'user_id',
								'invoice_number:ntext',
								//'invoice_status_id',
								//'billing_id',
								[
										'attribute' => 'billing_id',
										'label' => 'Billing Name',
										'value' => function($model, $index, $dataColumn) {
											return $model->billingContact->first . ' ' . $model->billingContact->last;
										},
									],
								// 'shipping_id',
								// 'payment_id',
								// 'date_created',
								// 'date_updated',
								//'date_due',
								[
										'attribute' => 'date_due',
										'label' => 'Date Due',
										'value' => function($model, $index, $dataColumn) {
											return date("m/d/Y", strtotime($model->date_due));
										},
									],
								// 'date_paid',
								// 'subtotal',
								// 'shipping',
								// 'credit',
								// 'tax',
								// 'tax_rate',
								//'total',
								[
										'attribute' => 'total',
										'label' => 'Total',
										'value' => function($model, $index, $dataColumn) {
											return '$' . $model->total;
										},
									],
								// 'token',
								// 'details:ntext',
								['class' => 'yii\grid\ActionColumn'],
						],
					]); ?>
							</div>
		  </div>
		</div>
	  </section>
