<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\Tag */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - Details: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="tag-details">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Tag Details') ?></h1>
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
            'name',
            'description:ntext',
            'color',
				],
			]) ?>
			</div>
		  </div>
		</div>
	  </section>