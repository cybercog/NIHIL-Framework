<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\support\models\search\FaqSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Faqs';
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
	  
	  <section id="faq-index">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1>FAQ's</h1>
				<?php
				foreach($faqs as $faq) {
				?>
				<h2><?php echo $faq->question; ?></h2>
				<p><?php echo $faq->answer; ?></p>
				<?php
				}
				?>
			</div>
		  </div>
		</div>
	  </section>