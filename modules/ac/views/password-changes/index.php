<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */

$this->title = 'uclemmer | AC Password Changes';
$this->params['breadcrumbs'][] = ['label' => 'AC', 'url' => '/ac'];
$this->params['breadcrumbs'][] = 'Password Changes';
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

						<div class="ac-passwordchanges-index">
							<h1><?= $this->context->action->uniqueId ?></h1>
							<p>
								This is the view content for action "<?= $this->context->action->id ?>".
								The action belongs to the controller "<?= get_class($this->context) ?>"
								in the "<?= $this->context->module->id ?>" module.
							</p>
							<p>
								You may customize this page by editing the following file:<br>
								<code><?= __FILE__ ?></code>
							</p>
						</div>

					</div>
				</div>
			</div>
		</section>