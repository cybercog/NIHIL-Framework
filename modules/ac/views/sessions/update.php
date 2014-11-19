<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\Session */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Update Session: ' . ' ' . $model->session_id;
$this->params['breadcrumbs'][] = ['label' => 'Sessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->session_id, 'url' => ['view', 'id' => $model->session_id]];
$this->params['breadcrumbs'][] = 'Update';
?>

	  <section id="session-update">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Session Update') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-9">
			
			</div>
		  </div>
		</div>
	  </section>
