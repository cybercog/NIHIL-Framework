<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\gow\models\BankDailyLog */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Update Bank Daily Log: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bank Daily Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

	  <section id="bank-daily-log-update">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Bank Daily Log Update') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-9">
			
			</div>
		  </div>
		</div>
	  </section>
