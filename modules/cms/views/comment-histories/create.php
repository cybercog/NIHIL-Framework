<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\CommentHistory */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Comment History Create';
$this->params['breadcrumbs'][] = ['label' => 'Comment Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<section id="comment-history-create">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Comment History Create') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-3">
			
			</div>
		  </div>
		</div>
	  </section>
