<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\modules\ecom\components\CartWidget;

/* @var $this yii\web\View */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Cart';
$this->params['breadcrumbs'][] = 'Cart';
?>

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
		
		<section id="site-content">
			<div class="container">
				<div class="row">
					<div class="col-md-9">

						<div class="ecom-orderitems-index">
							<h1>Cart</h1>
							
							<?= CartWidget::widget(); ?>
							
						</div>

					</div>
				</div>
			</div>
		</section>