<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

use app\modules\ecom\widgets\UsersRecentInvoicesWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ac\models\search\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Portal';
//$this->params['breadcrumbs'][] = array('label' => 'AC', 'url' => '/ac');
$this->params['breadcrumbs'][] = 'Portal';
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
					<div class="col-sm-12">
						<h1>Overview</h1>
					</div>
				</div>
			
				<div class="row">
					<div class="col-sm-12">
					
						<?= UsersRecentInvoicesWidget::widget(); ?>

					</div>
				</div>

			</div>
		</section>