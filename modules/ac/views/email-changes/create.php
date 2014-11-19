<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\EmailChange */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Email Change Create';
$this->params['breadcrumbs'][] = ['label' => 'Email Changes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<section id="email-change-create">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Email Change Create') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-3">
			
			</div>
		  </div>
		</div>
	  </section>
