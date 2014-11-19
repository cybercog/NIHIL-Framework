<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\gow\models\BankTransaction */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - Details: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bank Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="bank-transaction-details">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Bank Transaction Details') ?></h1>
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
            'reconciled',
            'bank_id',
            'player_id',
            'stone',
            'wood',
            'food',
            'ore',
            'silver',
            'timestamp',
            'notes:ntext',
				],
			]) ?>
			</div>
		  </div>
		</div>
	  </section>