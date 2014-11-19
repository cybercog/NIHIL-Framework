<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\EmailChange */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - Details: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Email Changes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="email-change-details">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Email Change Details') ?></h1>
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
            'user_id',
            'email:email',
            'date_created',
            'ip_address',
            'user_agent',
				],
			]) ?>
			</div>
		  </div>
		</div>
	  </section>