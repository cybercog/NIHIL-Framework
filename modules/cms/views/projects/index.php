<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\cms\models\search\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Projects';
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

	  <section id="project-index">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Knowledge Base') ?></h1>
				<p>
					This is the view content for action "index".
					The action belongs to the controller "yii\gii\generators\crud\Generator"
					in the "" module.
				</p>
				<p>
					You may customize this page by editing the following file:<br>
					<code>C:\xampp\server\nihil.co\www\library\gii\generators\crud\IVDCUDL\views\index.php</code>
				</p>
			</div>
		  </div>
		</div>
	  </section>