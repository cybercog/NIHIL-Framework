<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */

$this->title = 'uclemmer | Tutorials';
$this->params['breadcrumbs'][] = 'Tutorials';
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

						<div class="cms-projects-index">
							<h1>Tutorials</h1>
							
							<?php foreach($projects as $project) { ?>
							
								<h2><?php echo $project->title; ?></h2>
								
								<?php echo $project->description; ?>
								
							<?php } ?>
						</div>

					</div>
					<div class="col-md-3" style="padding-top:15px;padding-bottom:10px;">
					
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- uclemmer Tall -->
						<ins class="adsbygoogle"
							 style="display:inline-block;width:160px;height:600px"
							 data-ad-client="ca-pub-5089214589271094"
							 data-ad-slot="9079937707"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					
					</div>
				</div>
			</div>
		</section>