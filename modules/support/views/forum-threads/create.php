<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\support\models\ForumThread */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Forum Thread Create';
$this->params['breadcrumbs'][] = ['label' => 'Forum Threads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<section id="forum-thread-create">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Forum Thread Create') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-3">
			
			</div>
		  </div>
		</div>
	  </section>
