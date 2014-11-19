<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\support\models\ForumPostHistory */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Forum Post History Create';
$this->params['breadcrumbs'][] = ['label' => 'Forum Post Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<section id="forum-post-history-create">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Forum Post History Create') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-3">
			
			</div>
		  </div>
		</div>
	  </section>
