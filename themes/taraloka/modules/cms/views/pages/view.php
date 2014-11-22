<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\Page */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - View: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section id="site-content">
			<div class="container">
			
				<div class="row">
					<div class="col-sm-9">
					
						<div class="row">
							<div class="col-md-12">

								<div class="cms-projects-view">
									<h1><?php echo $model->name; ?></h1>
								</div>

							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
							
								<?php echo $model->content; ?>
									
							</div>
						</div>
					
					</div>
					<div class="col-sm-3" style="padding-top:15px;padding-bottom:10px;">
						
						<div class="row"><div class="col-xs-12"><h3>Join Our Mailing List</h3>
								<p>Keep up-to-date with events, news, and other important announcements.  We currently have over 2 subscribers and counting!</p><a href="/subscribe" class="btn btn-success btn-lg pull-right">Join Now</a></div></div>					
					</div>
				</div>
				
				
			</div>
		</section>

