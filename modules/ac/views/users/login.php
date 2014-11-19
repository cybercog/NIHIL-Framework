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
		
		<!--<section id="ac-users-login" class="eeeeee-n-ffffff">-->
		<section id="ac-users-login">
		<div class="container">
		  <div>
		    <div class="col-sm-12" id="login-main">
			
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
			
			</div>
		  </div>
		  </div>
		</section>