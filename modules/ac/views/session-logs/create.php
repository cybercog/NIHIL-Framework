<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\SessionLog */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Session Log Create';
$this->params['breadcrumbs'][] = ['label' => 'Session Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<section id="session-log-create">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Session Log Create') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-3">
			
			</div>
		  </div>
		</div>
	  </section>
