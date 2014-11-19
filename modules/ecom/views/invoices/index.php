<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\modules\ecom\widgets\InvoicesWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ecom\models\search\InvoiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Invoices';
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="ac-user-index">
        <div class="container">
		
          <div class="row">
		    <div class="col-xs-12">
				<div class="row">
				  <div class="col-sm-12">
				    <h1 class="page-header">Invoices</h1>
				  </div>
				</div>
				<div class="row">
				  <div class="col-sm-12">
				    <?= InvoicesWidget::widget(); ?>
				  </div>
				</div>
			</div>
		  </div>
		  
		</div>
	  </section>