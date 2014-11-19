<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\cms\models\search\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Posts';
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

	  <section id="post-index">
        <div class="container">
          <div class="row">
		    <div class="col-md-10 col-sm-9">
			  <div class="row">
			    <div class="col-xs-12">
				  <h1><?= Html::encode('Blog') ?></h1>
				</div>
			  </div>
			  <div class="row">
				<div class="col-sm-12">
				  <?php foreach($pModels as $post) { ?>
					<div class="row">
					  <div class="col-sm-12">
						<h2><?php echo $post->name; ?></h2>
						<p><?php echo $post->description; ?></p>
						<?php echo $post->content; ?>
					  </div>
					</div>
				  <?php } ?>
				</div>
			  </div>
			</div>
			<div class="col-md-2 col-sm-3">
			  AD
			</div>
		  </div>
		</div>
	  </section>