<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
use app\modules\ecom\components\CartWidget;
use app\modules\core\widgets\MailingListWidget;
use app\modules\pda\widgets\SubscribeWidget;

/* @var $this yii\web\View */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Shop | ' . $product->name;
$this->params['breadcrumbs'][] = ['label' => 'Shop', 'url' => '/shop'];
$this->params['breadcrumbs'][] = $product->name;
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
					<div class="col-md-9">

						<div class="ecom-products-view">
							
							<div class="row">
								
								<div class="col-sm-4">
									<div class="row">
										<div class="col-xs-12">
										<?php if($product->image) { ?>
											<img class="img-responsive product-image-view" src="<?php echo Yii::$app->homeUrl; ?>img/<?php echo $product->image; ?>" alt="<?php echo $product->name; ?>" />
										<?php }else{ ?>
											<img class="img-responsive product-image-view" src="http://placehold.it/600x600&text=Product" />
										<?php } ?>
										</div>
									</div>
								</div>
								
								<div class="col-sm-8">
									<div class="row">
										<div class="col-sm-8">
											<h1 class="product-view-name"><?php echo $product->name; ?> <small>from <?php echo $product->manufacturer_id; ?></small></h1>
										</div>
										<div class="col-sm-4 text-right">
											<h2 class="product-view-price">$<?php echo $product->price; ?></h2>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-8">
											<h3 class="product-view-id">Product Id: <?php echo str_pad($product->id, 5, '0', STR_PAD_LEFT); ?></h3>
										</div>
										<div class="col-sm-4 text-right">
											<h3 class="product-view-stock"><?php if($model->inStock($product->id)) { echo 'IN STOCK';} else { echo 'OUT OF STOCK'; } ?></h3>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<p class="product-view-description"><?php echo $product->description; ?></p>
										</div>
									</div>
									<?php 
									    if($model->inStock($product->id)) {
									
									        $form = ActiveForm::begin([
										    'id' => 'ecom-addtocart-form',
									        ]); 
									?>
									<div class="row">
										<div class="col-sm-2">
											<?= $form->field($model, 'qty') ?>
										</div>
										<div class="col-sm-6">
											<?= $form->field($model, 'paid')->dropDownList($model->paDropdown($product->id),['prompt'=>'']); ?>
										</div>
										<div class="col-sm-4">
											<?= Html::submitButton('add to cart', ['class' => 'btn btn-lg btn-success btn-block']) ?>
										</div>
									</div>
									<?php 
									        ActiveForm::end(); 
									    }
									?>
								</div>
								
							</div>

							
						</div>

					</div>
					<div class="col-sm-3">
					
						<?= CartWidget::widget(); ?>
						
						<?= SubscribeWidget::widget(); ?>
					
					</div>
				</div>
			</div>
		</section>