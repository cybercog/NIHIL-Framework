<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ecom\models\search\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Contact List';
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="contact-list">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Contact List') ?></h1>
								    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
				
					<p>
						<?= Html::a('Create Contact', ['create'], ['class' => 'btn btn-success']) ?>
					</p>

									<?= GridView::widget([
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
        'columns' => [
							['class' => 'yii\grid\SerialColumn'],

				            'id',
            'active',
            'user_id',
            'first',
            'middle',
            // 'last',
            // 'suffix',
            // 'company',
            // 'email:email',
            // 'phone',
            // 'address1',
            // 'address2',
            // 'address3',
            // 'city',
            // 'state',
            // 'zipcode',
            // 'country',
            // 'date_created',
            // 'date_confirmed',
            // 'date_last_used',
            // 'details:ntext',

							['class' => 'yii\grid\ActionColumn'],
						],
					]); ?>
							</div>
		  </div>
		</div>
	  </section>
