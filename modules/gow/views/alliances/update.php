<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\gow\models\Alliance */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Update Alliance: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Alliances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

	  <section id="alliance-update">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Alliance Update') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-9">
			
			</div>
		  </div>
		</div>
	  </section>
