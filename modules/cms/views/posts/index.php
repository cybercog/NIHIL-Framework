<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */

$this->title = 'uclemmer | Blog';
$this->params['breadcrumbs'][] = 'Blog';
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

						<div class="cms-posts-index">
							<h1>Blog</h1>
							
							<?php foreach($posts as $post) { ?>
							
								<h2><?php echo $post->name; ?></h2>
								
								<?php echo $post->content; ?>
								
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