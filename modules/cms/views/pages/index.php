<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */

$this->title = 'uclemmer | Pages';

$this->registerMetaTag(['description' => 'Pages offer structure to uclemmer.com.']);
$this->registerMetaTag(['keywords' => 'uclemmer.com, uriah, clemmer, nihil, nihil corporation']);

$this->registerMetaTag(['og:title' => 'uclemmer.com | Pages']);
$this->registerMetaTag(['og:image' => 'http://www.uclemmer.com/favicon/600x600.png']);
$this->registerMetaTag(['og:url' => 'http://www.uclemmer.com/pages']);
$this->registerMetaTag(['og:site_name' => 'uclemmer.com']);
$this->registerMetaTag(['og:type' => 'website']);
$this->registerMetaTag(['og:description' => 'Pages offer structure to uclemmer.com']);


//$this->params['breadcrumbs'][] = ['label' => 'CMS', 'url' => '/cms'];
$this->params['breadcrumbs'][] = 'Pages';
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
					<div class="col-xs-12">
					
						<div class="visible-xs-block text-center" style="padding-top:15px;">
						<?php if(!YII_DEBUG) { ?>
							<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
							<!-- Test Mobile Banner -->
							<ins class="adsbygoogle"
								 style="display:inline-block;width:320px;height:50px"
								 data-ad-client="ca-pub-5089214589271094"
								 data-ad-slot="9365591705"></ins>
							<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
							</script>
						<?php }else{ ?>
							<img src="http://placehold.it/320x50&text=Ad" alt="Ad" />
						<?php } ?>
						</div>
					
					</div>
				</div>
			
				<div class="row">
					<div class="col-md-9">
						
						<div class="row">
							<div class="col-md-12">
							
								<h1>Pages</h1>
							
								<?php foreach($pages as $page) { ?>
								
									<h2><?php echo $page->name; ?></h2>
									
									<?php echo $page->description; ?>
									
								<?php } ?>
							
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								
								<div class="visible-xs-block text-center">
								<?php if(!YII_DEBUG) { ?>
									<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
									<!-- Test Mobile Large Block -->
									<ins class="adsbygoogle"
										 style="display:inline-block;width:336px;height:280px"
										 data-ad-client="ca-pub-5089214589271094"
										 data-ad-slot="6412125308"></ins>
									<script>
									(adsbygoogle = window.adsbygoogle || []).push({});
									</script>
								<?php }else{ ?>
									<img src="http://placehold.it/336x280&text=Ad" alt="Ad" />
								<?php } ?>
								</div>
							
							</div>
						</div>
					
					</div>
					<div class="col-sm-3" style="padding-top:15px;padding-bottom:10px;">
						
						<div class="hidden-xs">
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
				
				
			</div>
		</section>