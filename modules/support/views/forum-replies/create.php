<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\support\models\ForumReply */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Forum Reply Create';
$this->params['breadcrumbs'][] = ['label' => 'Forum Replies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<section id="forum-reply-create">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Forum Reply Create') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-3">
			
			</div>
		  </div>
		</div>
	  </section>
