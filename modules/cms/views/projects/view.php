<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\Project */

$this->title = 'uclemmer | CMS Projects View';
$this->params['breadcrumbs'][] = ['label' => 'CMS', 'url' => '/cms'];
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => '/cms/projects'];
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
					<div class="col-md-9">
					
						<div class="row">
							<div class="col-md-12">

								<div class="cms-projects-view">
									<h1><?php echo $project->title; ?></h1>
									
									<?php foreach($project->findProjectIntroduction($project->id) as $intro) { ?>
									
										<?php echo $intro->content; ?>
									
									<?php } ?>
								</div>

							</div>
						</div>
						
						<?php if($steps = $project->findProjectSteps($project->id)) { ?>
						<div class="row">
							<div class="col-md-12">
								
								<ol>
								
								<?php foreach($steps as $step) { ?>
									
									<li><?php echo $step->content; ?></li>
									
								<?php } ?>
								
								</ol>
							
							</div>
						</div>
						<?php } ?>
						
						<div class="row">
							<div class="col-md-12">
							
								<?php foreach($project->findProjectConclusion($project->id) as $conclusion) { ?>
									
									<?php echo $conclusion->content; ?>
									
								<?php } ?>
							
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
							
							<?php if(!YII_DEBUG) { ?>
								<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
								<!-- uclemmer Wide -->
								<ins class="adsbygoogle"
									 style="display:inline-block;width:728px;height:90px"
									 data-ad-client="ca-pub-5089214589271094"
									 data-ad-slot="2160603302"></ins>
								<script>
								(adsbygoogle = window.adsbygoogle || []).push({});
								</script>
							<?php }else{ ?>
								<img src="http://placehold.it/728x90&text=Ad" alt="Ad" />
							<?php } ?>
							
							</div>
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