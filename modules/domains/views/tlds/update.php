<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\domains\models\Tld */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Update Tld: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tlds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

	  <section id="tld-update">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Tld Update') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-9">
			
			</div>
		  </div>
		</div>
	  </section>