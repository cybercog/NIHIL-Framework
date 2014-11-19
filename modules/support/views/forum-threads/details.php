<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\support\models\ForumThread */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - Details: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Forum Threads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="forum-thread-details">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Forum Thread Details') ?></h1>
				<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
				<?= Html::a('Delete', ['delete', 'id' => $model->id], [
					'class' => 'btn btn-danger',
					'data' => [
						'confirm' => 'Are you sure you want to delete this item?',
						'method' => 'post',
					],
				]) ?>
			</p>

			<?= DetailView::widget([
				'model' => $model,
				'attributes' => [
		            'id',
            'parent',
            'forum_id',
            'name',
            'slug',
            'posts_count',
				],
			]) ?>
			</div>
		  </div>
		</div>
	  </section>