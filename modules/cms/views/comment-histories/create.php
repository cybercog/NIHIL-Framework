<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\CommentHistory */

$this->title = 'uclemmer | CMS Comment Histories Create';
$this->params['breadcrumbs'][] = ['label' => 'CMS', 'url' => '/cms'];
$this->params['breadcrumbs'][] = ['label' => 'Comment Histories', 'url' => '/cms/comment-histories'];
$this->params['breadcrumbs'][] = 'Create';
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

						<div class="cms-commenthistories-create">
							<h1>CMS Comment Histories Create</h1>

							<?= $this->render('_form', [
								'model' => $model,
							]) ?>
						</div>

					</div>
				</div>
			</div>
		</section>