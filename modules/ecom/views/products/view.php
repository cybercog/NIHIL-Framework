<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\DetailView;

/* @var $this yii\web\View */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Shop | ' . $product->name;
$this->params['breadcrumbs'][] = ['label' => 'Shop', 'url' => '/shop'];
$this->params['breadcrumbs'][] = $product->name;
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

						<div class="ecom-products-view">
							<h1><?php echo $product->name; ?></h1>

							<p>
								<?= Html::a('Update', ['update', 'id' => $product->id], ['class' => 'btn btn-primary']) ?>
								<?= Html::a('Delete', ['delete', 'id' => $product->id], [
									'class' => 'btn btn-danger',
									'data' => [
										'confirm' => 'Are you sure you want to delete this item?',
										'method' => 'post',
									],
								]) ?>
							</p>

							<?= DetailView::widget([
								'model' => $product,
								'attributes' => [
									'id',
									'visible',
									'sku:ntext',
									'manufacturer_id',
									'name',
									'image',
									'cost',
									'price',
									'description:ntext',
									'details:ntext',
									'sold',
								],
							]) ?>
						</div>

					</div>
				</div>
			</div>
		</section>