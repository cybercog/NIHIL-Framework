<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Checkout Success';
$this->params['breadcrumbs'][] = 'Checkout';
$this->params['breadcrumbs'][] = 'Success';
?>
		<!--
		<section id="site-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
		
						<?= Breadcrumbs::widget([
							'homeLink' => [
								'label' => 'Home',
								'template' => "<li><a href='\'><i class='fa fa-home'></i></a></li>\n",
							],
							'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
						]) ?>
			
					</div>
				</div>
			</div>
		</section>
		-->
		
		<section id="site-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">

						<div class="ecom-orders-index">
							<h1>Checkout Success</h1>
							<div class="alert alert-warning" role="alert">The shop is currently in test mode.  All transactions will not be processed.</div>
							<p>Bingo.  We are good to go.</p>
						</div>

					</div>
				</div>
			</div>
		</section>