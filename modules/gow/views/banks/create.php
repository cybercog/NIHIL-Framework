<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\gow\models\Bank */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Bank Create';
$this->params['breadcrumbs'][] = ['label' => 'Banks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<section id="bank-create">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Bank Create') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-3">
			
			</div>
		  </div>
		</div>
	  </section>
