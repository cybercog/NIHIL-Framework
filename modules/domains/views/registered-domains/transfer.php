<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\domains\models\search\RegisteredDomainSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Registered Domains';
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
	  
	  <section id="site-domains">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				
				<form>
				<div class="row">
				  <div class="col-sm-6 col-sm-offset-3">
					<div class="input-group input-group-lg">
					  <span class="input-group-addon">www.</span>
					  <input type="text" class="form-control">
					  <span class="input-group-btn">
						<button class="btn btn-default" type="button">Search</button>
					  </span>
					</div><!-- /input-group -->
				  </div><!-- /.col-lg-6 -->
				</div><!-- /.row -->
				</form>
				
			</div>
		  </div>
		</div>
	  </section>
	  <section id="domains-registereddomains-transfer">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1>Domains Transfer</h1>
				<p>
					This is the view content for action "<?= $this->context->action->id ?>".
					The action belongs to the controller "<?= get_class($this->context) ?>"
					in the "<?= $this->context->module->id ?>" module.
				</p>
				<p>
					You may customize this page by editing the following file:<br>
					<code><?= __FILE__ ?></code>
				</p>
			</div>
		  </div>
		</div>
	  </section>