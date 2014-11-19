<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\gow\models\Alliance */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Alliance Create';
$this->params['breadcrumbs'][] = ['label' => 'Alliances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<section id="alliance-create">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Alliance Create') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-3">
			
			</div>
		  </div>
		</div>
	  </section>
