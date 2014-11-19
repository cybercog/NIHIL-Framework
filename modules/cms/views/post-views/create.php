<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\PostView */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Post View Create';
$this->params['breadcrumbs'][] = ['label' => 'Post Views', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<section id="post-view-create">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Post View Create') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-3">
			
			</div>
		  </div>
		</div>
	  </section>
