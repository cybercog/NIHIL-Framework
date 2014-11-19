<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\support\models\Faq */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Update Faq: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Faqs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

	  <section id="faq-update">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Faq Update') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-9">
			
			</div>
		  </div>
		</div>
	  </section>