<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\domains\models\Tld */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Tld Create';
$this->params['breadcrumbs'][] = ['label' => 'Tlds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<section id="tld-create">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Tld Create') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-3">
			
			</div>
		  </div>
		</div>
	  </section>
