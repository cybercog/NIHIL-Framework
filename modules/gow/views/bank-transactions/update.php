<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\gow\models\BankTransaction */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Update Bank Transaction: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bank Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

	  <section id="bank-transaction-update">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Bank Transaction Update') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-9">
			
			</div>
		  </div>
		</div>
	  </section>
