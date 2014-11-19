<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\Session */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - Details: ' . $model->session_id;
$this->params['breadcrumbs'][] = ['label' => 'Sessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="session-details">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Session Details') ?></h1>
				<?= Html::a('Update', ['update', 'id' => $model->session_id], ['class' => 'btn btn-primary']) ?>
				<?= Html::a('Delete', ['delete', 'id' => $model->session_id], [
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
		            'session_id',
            'user_id',
            'date_created',
            'date_expires',
				],
			]) ?>
			</div>
		  </div>
		</div>
	  </section>