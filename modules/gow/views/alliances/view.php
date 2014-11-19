<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\gow\models\Alliance */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - View: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Alliances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="alliance-view">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Alliance View') ?></h1>
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
            'abbr',
            'name',
            'image',
            'description:ntext',
            'date_created',
				],
			]) ?>
			</div>
		  </div>
		</div>
	  </section>