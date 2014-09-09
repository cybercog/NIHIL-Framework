<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\DetailView;

/* @var $this yii\web\View */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Invoices View';
$this->params['breadcrumbs'][] = ['label' => 'Invoices', 'url' => '/ecom/invoices'];
$this->params['breadcrumbs'][] = 'View';
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

						<div class="ecom-invoices-view">
							<h1>Ecom Invoices View</h1>

							<p>
								<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
								<?= Html::a('Delete', ['delete', 'id' => $model->id], [
									'class' => 'btn btn-danger',
									'data' => [
										'confirm' => 'Are you sure you want to delete this item?',
										'method' => 'post',
									],
								]) ?>
							</p>

							<?= DetailView::widget([
								'model' => $model,
								'attributes' => [
									'id',
									'invoice_number:ntext',
									'invoice_status_id',
									'customer_id',
									'shipping_id',
									'payment_id',
									'date_created',
									'date_due',
									'date_paid',
									'subtotal',
									'shipping',
									'credit',
									'tax',
									'tax_rate',
									'total',
									'token',
									'details:ntext',
								],
							]) ?>
						</div>

					</div>
				</div>
			</div>
		</section>