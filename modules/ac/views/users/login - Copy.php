<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ac\models\search\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Login';
//$this->params['breadcrumbs'][] = array('label' => 'AC', 'url' => '/ac');
//$this->params['breadcrumbs'][] = array('label' => 'Users', 'url' => '/ac/users');
$this->params['breadcrumbs'][] = 'Login';
?>
		
		<section id="ac-users-login">
		  <div class="row blank-dark">
		    <div class="col-sm-6 col-sm-offset-3" id="login-alerts">
			
			  <?php if (Yii::$app->session->hasFlash('success')) { ?>
  <div class="alert alert-success alert-dismissible alert-flash" id="flashMessage" role="alert">
	<div class="container">
	  <!--<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
	  <strong><i class="fa fa-check-square"></i> Success:</strong> <?= Yii::$app->session->getFlash('success'); ?>
	</div>
  </div>
  <?php }elseif (Yii::$app->session->hasFlash('warning')) { ?>
  <div class="alert alert-warning alert-dismissible alert-flash" id="flashMessage" role="alert">
	<div class="container">
	  <!--<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
	  <strong><i class="fa fa-exclamation-triangle"></i> Warning:</strong> <?= Yii::$app->session->getFlash('warning'); ?>
	</div>
  </div>
  <?php }elseif (Yii::$app->session->hasFlash('danger')) { ?>
  <div class="alert alert-danger alert-dismissible alert-flash" id="flashMessage" role="alert">
	<div class="container">
	  <!--<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
	  <strong><i class="fa fa-exclamation-triangle"></i> Error:</strong> <?= Yii::$app->session->getFlash('danger'); ?>
	</div>
  </div>
  <?php }elseif (Yii::$app->session->hasFlash('info')) { ?>
  <div class="alert alert-info alert-dismissible alert-flash" id="flashMessage" role="alert">
	<div class="container">
	  <!--<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
	  <strong><i class="fa fa-info-circle"></i> Info:</strong> <?= Yii::$app->session->getFlash('info'); ?>
	</div>
  </div>
  <?php } ?>

			
			</div>
		  </div>
		  <div class="row blank-dark">
		    <div class="col-sm-6 col-sm-offset-3" id="login-main">
			
			  <div class="row">
			    <div class="col-sm-6"  id="login-cta">
				  <h2><?php echo $posts[0]->name; ?></h2>
				  <p><?php echo $posts[0]->description; ?></p>
				  <p>Check out some other recent posts:</p>
				  <?php unset($posts[0]); ?>
				  <ul class="list-unstyled">
				    <?php foreach($posts as $post) { ?>
					<li><a href="/company/blog/<?php echo $post->slug; ?>"><?php echo $post->name; ?></a></li>
					<?php } ?>
				  </ul>
				  <p>or read more at <a href="/company/blog">The NIHIL Corporations official blog!</a></p>
				
				</div>
				<div class="col-sm-6" id="login-formarea">
				
				  <h1>Sign In</h1>
						
				  <?php $form = ActiveForm::begin(); ?>

				  <?= $form->field($model, 'username')->textInput(['maxlength' => 100]) ?>

				  <?= $form->field($model, 'password')->passwordInput(['maxlength' => 128]) ?>
				
				  <?= $form->field($model, 'rememberMe')->checkbox() ?>

				  <div class="form-group">
					<?= Html::submitButton('login', ['class' => 'btn btn-success btn-lg']) ?>
					<a href="#" class="btn btn-link">Cant access your account?</a>
				  </div>

				  <?php ActiveForm::end(); ?>
				
				</div>
			  </div>
			  <div class="row" id="login-footer-legal">
			    <div class="col-sm-6" id="login-footer-legal-copyright">
				  Copyright &copy; 2010-<?php echo date("Y"); ?> The NIHIL Corporation.  All rights reserved.
				</div>
				<div class="col-sm-6" id="login-footer-legal-navigation">
				  <ul class="list-inline">
					<li><a href="/legal/privacy">Privacy</a></li>
					<li><a href="/support">Support</a></li>
					<li><a href="/signup">Signup</a></li>
				  </ul>
				</div>
			  </div>
			
			</div>
		  </div>
		</section>