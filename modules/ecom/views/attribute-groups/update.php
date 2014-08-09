<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'uclemmer | Ecom Attribute Groups Update';
$this->params['breadcrumbs'][] = ['label' => 'Ecom', 'url' => '/ecom'];
$this->params['breadcrumbs'][] = ['label' => 'Attribute Groups', 'url' => '/ecom/attribute-groups'];
$this->params['breadcrumbs'][] = 'Update';
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
					<div class="col-md-12">

						<div class="ecom-attributegroups-update">
							<h1>Ecom Attribute Group Update</h1>

							<?= $this->render('_form', [
								'model' => $model,
							]) ?>
						</div>

					</div>
				</div>
			</div>
		</section>