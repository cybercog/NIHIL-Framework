<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\support\models\ForumReplyVote */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Update Forum Reply Vote: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Forum Reply Votes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

	  <section id="forum-reply-vote-update">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Forum Reply Vote Update') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-9">
			
			</div>
		  </div>
		</div>
	  </section>
