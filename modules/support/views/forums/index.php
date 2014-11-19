<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\support\models\search\ForumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Forums';
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="site-banner">
        <div class="container-fluid">
          <div class="row">
		    <div class="col-xs-12">
				
				<div class="container">
					<div class="jumbotron">
						<h1>Congratulations!</h1>

						<p class="lead">You have successfully created your Yii-powered application.</p>

						<p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
					</div>
				</div>
				
			</div>
		  </div>
		</div>
	  </section>

	  <section id="forum-index">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Forums') ?></h1>
				<p>
					<?= Html::encode($forum->description) ?>
				</p>
			</div>
		  </div>
		</div>
	  </section>