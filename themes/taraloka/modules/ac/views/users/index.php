<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

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
					<div class="col-sm-5">
					
						asdf

					</div>
					<div class="col-sm-5 col-sm-offset-1">
					
						<div class="table-responsive">
						  <table class="table">
							<thead>
								<tr>
									<th colspan="2"><h2>Recent Activity</h2></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>Date</th>
									<th>Description</th>
									<th>&nbsp;</th>
								</tr>
								<tr>
									<td>01/01/2014</td>
									<td>You made a donation.</td>
									<td><a href="#">view</a> | <a href="#">print</a></td>
								</tr>
								<tr>
									<td>02/02/2014</td>
									<td>You made an order.</td>
									<td><a href="#">view</a> | <a href="#">print</a></td>
								</tr>
								<tr>
									<td>03/03/2014</td>
									<td>You joined our mailing list.</td>
									<td><a href="#">manage</a></td>
								</tr>
							</tbody>
						  </table>
						</div>

					</div>
				</div>

			</div>
		</section>