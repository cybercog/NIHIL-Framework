<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\InvoiceStatus */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Invoice Status Create';
$this->params['breadcrumbs'][] = ['label' => 'Invoice Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<section id="invoice-status-create">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Invoice Status Create') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-3">
			
			</div>
		  </div>
		</div>
	  </section>
