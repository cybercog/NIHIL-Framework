<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\Page */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | ' . $page->name;
$this->registerMetaTag(['description' => $page->description]);
$this->registerMetaTag(['keywords' => 'uclemmer.com, uriah, clemmer, nihil, nihil corporation']); // Update keywords from tags

$this->registerMetaTag(['og:title' => Yii::$app->params['siteMeta']['title'] . ' | ' . $page->name]);
$this->registerMetaTag(['og:image' => 'http://www.uclemmer.com/favicon/600x600.png']);
$this->registerMetaTag(['og:url' => 'http://www.uclemmer.com/tutorials/' . $page->slug]);
$this->registerMetaTag(['og:site_name' => Yii::$app->params['siteMeta']['site_name']]);
$this->registerMetaTag(['og:type' => 'article']);
$this->registerMetaTag(['og:description' => $page->description]);

//$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => '/pages'];
$this->params['breadcrumbs'][] = $page->name;
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
					<div class="col-sm-9">
					
						<div class="row">
							<div class="col-md-12">

								<div class="cms-projects-view">
									<h1><?php echo $page->name; ?></h1>
								</div>

							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
									
								<?php echo $page->content; ?>

							</div>
						</div>
					
					</div>
					<div class="col-sm-3" style="padding-top:15px;padding-bottom:10px;">
					
						&nbsp;
					
					</div>
				</div>
				
				
			</div>
		</section>