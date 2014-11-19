<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ecom\models\search\InvoiceItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Invoice Item List';
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="invoice-item-list">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Invoice Item List') ?></h1>
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
            'name:ntext',
            'quantity',
            'unit_price',
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
	  </section>
