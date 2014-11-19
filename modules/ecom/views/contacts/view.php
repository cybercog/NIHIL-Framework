<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\Contact */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - View: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="contact-view">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Contact View') ?></h1>
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
            'active',
            'user_id',
            'first',
            'middle',
            'last',
            'suffix',
            'company',
            'email:email',
            'phone',
            'address1',
            'address2',
            'address3',
            'city',
            'state',
            'zipcode',
            'country',
            'date_created',
            'date_confirmed',
            'date_last_used',
            'details:ntext',
				],
			]) ?>
			</div>
		  </div>
		</div>
	  </section>