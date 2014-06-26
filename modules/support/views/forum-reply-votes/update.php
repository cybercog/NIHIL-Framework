<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\support\models\ForumReplyVote */

$this->title = 'uclemmer | Support Forum Reply Votes Update';
$this->params['breadcrumbs'][] = ['label' => 'Support', 'url' => '/support'];
$this->params['breadcrumbs'][] = ['label' => 'Forum Reply votes', 'url' => '/ac/forum-reply-votes'];
$this->params['breadcrumbs'][] = 'Update';
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

						<div class="support-forumreplyvotes-update">
							<h1>Support Forum Reply Votes Update</h1>

							<?= $this->render('_form', [
								'model' => $model,
							]) ?>
						</div>

					</div>
				</div>
			</div>
		</section>