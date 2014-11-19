<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\gow\models\Player */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Player Create';
$this->params['breadcrumbs'][] = ['label' => 'Players', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<section id="player-create">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Player Create') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-3">
			
			</div>
		  </div>
		</div>
	  </section>
