<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\support\models\ForumReply */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - View: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Forum Replies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="forum-reply-view">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Forum Reply View') ?></h1>
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
            'post_id',
            'user_id',
            'content:ntext',
            'date_created',
            'date_modified',
            'date_edited',
            'votes_up',
            'votes_down',
            'accepted',
				],
			]) ?>
			</div>
		  </div>
		</div>
	  </section>