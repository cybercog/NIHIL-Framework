<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\gow\models\Bank */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Update Bank: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Banks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

	  <section id="bank-update">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Bank Update') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-9">
			
			</div>
		  </div>
		</div>
	  </section>
