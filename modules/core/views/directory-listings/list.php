<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\core\models\search\DirectoryListingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Directory Listing List';
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="directory-listing-list">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Directory Listing List') ?></h1>
								    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
				
					<p>
						<?= Html::a('Create Directory Listing', ['create'], ['class' => 'btn btn-success']) ?>
					</p>

									<?= GridView::widget([
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
        'columns' => [
							['class' => 'yii\grid\SerialColumn'],

				            'id',
            'name',
            'url:url',
            'image',
            'description:ntext',

							['class' => 'yii\grid\ActionColumn'],
						],
					]); ?>
							</div>
		  </div>
		</div>
	  </section>