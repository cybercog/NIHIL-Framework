<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\AuthKey */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Auth Key Create';
$this->params['breadcrumbs'][] = ['label' => 'Auth Keys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<section id="auth-key-create">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Auth Key Create') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-3">
			
			</div>
		  </div>
		</div>
	  </section>
