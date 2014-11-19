<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\AuthItemChild */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Update Auth Item Child: ' . ' ' . $model->parent;
$this->params['breadcrumbs'][] = ['label' => 'Auth Item Children', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->parent, 'url' => ['view', 'parent' => $model->parent, 'child' => $model->child]];
$this->params['breadcrumbs'][] = 'Update';
?>

	  <section id="auth-item-child-update">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Auth Item Child Update') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-9">
			
			</div>
		  </div>
		</div>
	  </section>