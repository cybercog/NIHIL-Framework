<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */

$this->title = 'uclemmer | Support Ticket Statuses List';
$this->params['breadcrumbs'][] = ['label' => 'Support', 'url' => '/support'];
$this->params['breadcrumbs'][] = 'Ticket Statuses';
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

						<div class="support-ticketstatuses-index">
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