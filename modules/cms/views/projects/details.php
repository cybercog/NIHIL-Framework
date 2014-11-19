<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\Project */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - Details: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="project-details">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Project Details') ?></h1>
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
            'author_id',
            'title',
            'slug',
            'image',
            'description:ntext',
            'date_created',
            'date_updated',
            'date_published',
            'votes_up',
            'votes_down',
            'views',
            'date_lastview',
				],
			]) ?>
			</div>
		  </div>
		</div>
	  </section>