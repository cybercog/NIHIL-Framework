<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\gow\models\BankDailyLog */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Bank Daily Log Create';
$this->params['breadcrumbs'][] = ['label' => 'Bank Daily Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<section id="bank-daily-log-create">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Bank Daily Log Create') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-3">
			
			</div>
		  </div>
		</div>
	  </section>
