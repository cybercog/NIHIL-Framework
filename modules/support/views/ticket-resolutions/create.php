<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\support\models\TicketResolution */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Ticket Resolution Create';
$this->params['breadcrumbs'][] = ['label' => 'Ticket Resolutions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<section id="ticket-resolution-create">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Ticket Resolution Create') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-3">
			
			</div>
		  </div>
		</div>
	  </section>
