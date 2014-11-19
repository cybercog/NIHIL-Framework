<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\PageView */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Page View Create';
$this->params['breadcrumbs'][] = ['label' => 'Page Views', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<section id="page-view-create">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Page View Create') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-3">
			
			</div>
		  </div>
		</div>
	  </section>
