<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\CommentVote */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Comment Vote Create';
$this->params['breadcrumbs'][] = ['label' => 'Comment Votes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<section id="comment-vote-create">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Comment Vote Create') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-3">
			
			</div>
		  </div>
		</div>
	  </section>
