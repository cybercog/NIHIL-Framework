<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\AuthItemChild */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - Details: ' . $model->parent;
$this->params['breadcrumbs'][] = ['label' => 'Auth Item Children', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="auth-item-child-details">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Auth Item Child Details') ?></h1>
				<?= Html::a('Update', ['update', 'parent' => $model->parent, 'child' => $model->child], ['class' => 'btn btn-primary']) ?>
				<?= Html::a('Delete', ['delete', 'parent' => $model->parent, 'child' => $model->child], [
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
		            'parent',
            'child',
				],
			]) ?>
			</div>
		  </div>
		</div>
	  </section>