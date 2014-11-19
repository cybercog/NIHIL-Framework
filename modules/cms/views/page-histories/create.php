<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\PageHistory */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Page History Create';
$this->params['breadcrumbs'][] = ['label' => 'Page Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<section id="page-history-create">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Page History Create') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-3">
			
			</div>
		  </div>
		</div>
	  </section>
