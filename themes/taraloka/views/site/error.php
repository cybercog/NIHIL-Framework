<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/**
 * @var yii\web\View $this
 * @var string $name
 * @var string $message
 * @var Exception $exception
 */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Error';
$this->params['breadcrumbs'][] = 'Error';
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

						<div class="site-error">

							<h1><?= Html::encode($name) ?></h1>

							<div class="alert alert-danger">
								<?= nl2br(Html::encode($message)) ?>
							</div>

							<p>
								The above error occurred while the Web server was processing your request.
							</p>
							<p>
								Please contact us if you think this is a server error. Thank you.
							</p>

						</div>

					</div>
				</div>
			</div>
		</section>