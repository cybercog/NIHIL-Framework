<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/**
 * @var yii\web\View $this
 */
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>

		<section id="site-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
		
						<?= Breadcrumbs::widget([
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

						<div class="site-about">
							<h1><?= Html::encode($this->title) ?></h1>

							<p>
								This is the About page. You may modify the following file to customize its content:
							</p>

							<code><?= __FILE__ ?></code>
						</div>

					</div>
				</div>
			</div>
		</section>