<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = \Yii::$app->params['siteMeta']['title'] . ' | Tools | Random String Generator';

?>
  
    <section id="site-banner">
        <div class="container-fluid">
          <div class="row">
		    <div class="col-xs-12">
				
				<div class="container">
					<div class="jumbotron">
						<h1>Congratulations!</h1>

						<p class="lead">You have successfully created your Yii-powered application.</p>

						<p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
					</div>
				</div>
				
			</div>
		  </div>
		</div>
	  </section>
	  
	  <section id="tools-randomStringGenerator-index">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1>Random String Generator</h1>
			</div>
		  </div>
		  <?php if(isset($strings)) { ?>
			    <div class="row"><div class="col-sm-12"><pre><?php foreach($strings as $string) { echo $string . PHP_EOL; } ?></pre></div></div>
			  <?php } ?>
		  <div class="row">
		    <div class="col-sm-4">
	
				<?php $form = ActiveForm::begin(); ?>
				<div class="row">
				  <div class="col-sm-12">
				    <?= $form->field($model, 'count')->textInput(['maxlength' => 10, 'value' => $model->count]) ?>
				  </div>
				</div>
				<div class="row">
				  <div class="col-sm-12">
				    <?= $form->field($model, 'length')->textInput(['maxlength' => 10, 'value' => $model->length]) ?>
				  </div>
				</div>
				<div class="row">
				  <div class="col-sm-12">
				    <label class="control-label" for="randomstringgeneratorform-length">What characters should we use?</label>
					<ul class="list-inline">
					  <li><?= $form->field($model, 'ct_alpha_lower')->checkbox() ?></li>
					  <li><?= $form->field($model, 'ct_alpha_upper')->checkbox() ?></li>
					  <li><?= $form->field($model, 'ct_numeric')->checkbox() ?></li>
					  <li><?= $form->field($model, 'ct_special')->checkbox() ?></li>
					</ul>
					
				  </div>
				</div>
				<div class="row">
				  <div class="col-sm-12">
				    <?= Html::submitButton('Generate', ['class' => 'btn btn-success btn-lg']) ?>
				  </div>
				</div>
				<?php ActiveForm::end(); ?>
	
			</div>
		  </div>
		</div>
	  </section>