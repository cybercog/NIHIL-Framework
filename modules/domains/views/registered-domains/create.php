<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\domains\models\RegisteredDomain */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Registered Domain Create';
$this->params['breadcrumbs'][] = ['label' => 'Registered Domains', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<section id="registered-domain-create">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Registered Domain Create') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-3">
			
			</div>
		  </div>
		</div>
	  </section>
