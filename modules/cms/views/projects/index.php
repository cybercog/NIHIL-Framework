<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */

$this->title = 'uclemmer | Tutorials';
$this->registerMetaTag(['description' => 'Uriah writes the tutorials at uclemmer.com firstly to remind himself so as not to reinvent the wheel, and secondly to share his accomplishments with the world.  If someone else benefits from his guides, then Uriah has helped make the world a better place.']);
$this->registerMetaTag(['keywords' => 'uclemmer.com, uriah, clemmer, nihil, nihil corporation, tutorials, php, xampp, volvo 240, yii2']);

$this->registerMetaTag(['og:title' => 'uclemmer.com | Tutorials']);
$this->registerMetaTag(['og:image' => 'http://www.uclemmer.com/favicon/600x600.png']);
$this->registerMetaTag(['og:url' => 'http://www.uclemmer.com/tutorials']);
$this->registerMetaTag(['og:site_name' => 'uclemmer.com']);
$this->registerMetaTag(['og:type' => 'website']);
$this->registerMetaTag(['og:description' => 'Uriah writes the tutorials at uclemmer.com firstly to remind himself so as not to reinvent the wheel, and secondly to share his accomplishments with the world.  If someone else benefits from his guides, then Uriah has helped make the world a better place.']);

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
					
					<?php if(!YII_DEBUG) { ?>
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- uclemmer Tall -->
						<ins class="adsbygoogle"
							 style="display:inline-block;width:160px;height:600px"
							 data-ad-client="ca-pub-5089214589271094"
							 data-ad-slot="9079937707"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					<?php }else{ ?>
						<img src="http://placehold.it/160x600&text=Ad" alt="Ad" />
					<?php } ?>
					
					</div>
				</div>
			</div>
		</section>