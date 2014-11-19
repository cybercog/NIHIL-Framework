<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\gow\models\BankTransaction */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Bank Transaction Create';
$this->params['breadcrumbs'][] = ['label' => 'Bank Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<section id="bank-transaction-create">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Bank Transaction Create') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-3">
			
			</div>
		  </div>
		</div>
	  </section>
