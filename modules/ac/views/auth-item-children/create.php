<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\AuthItemChild */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Auth Item Child Create';
$this->params['breadcrumbs'][] = ['label' => 'Auth Item Children', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<section id="auth-item-child-create">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Auth Item Child Create') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-3">
			
			</div>
		  </div>
		</div>
	  </section>