<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' | Home';
?>

	<section id="site-banner">
        <div class="container" id="quickstart">
          <div class="row">
		    <div class="col-xs-12">
				
				<div class="jumbotron">
					<div class="row">
					  <div class="col-sm-8">
						<h1>1-Hour Quickstart</h1>
						<p class="lead">We will walk you through everything.</p>
						<p><a class="btn btn-lg btn-default" href="http://www.yiiframework.com">Get started for $99.99</a></p>
					  </div>
					  <div class="col-sm-4">
						
						<ul class="list-group">
						  <li class="list-group-item"><i class="fa fa-check"></i> .COM Registration</li>
						  <li class="list-group-item"><i class="fa fa-check"></i> 1-year Shared Hosting</li>
						  <li class="list-group-item"><i class="fa fa-check"></i> Personal Email Accounts</li>
						  <li class="list-group-item"><i class="fa fa-check"></i> Website Analytics</li>
						  <li class="list-group-item"><i class="fa fa-check"></i> Content Management System</li>
						  <li class="list-group-item"><i class="fa fa-check"></i> 45-Minute Tutorial</li>
						</ul>
						
					  </div>
					</div>
					

					
				</div>
				
			</div>
		  </div>
		</div>
	  </section>
	  
	  <section id="site-domains">
        <div class="container">
		
          <div class="row">
		    <div class="col-xs-12">
				
				<form>
				<div class="row">
				  <div class="col-xs-12">
					<div class="input-group input-group-lg">
					  <input type="text" class="form-control" placeholder="Enter a domain name - example.com">
					  <span class="input-group-btn">
						<button class="btn btn-default" type="button">Search Domains</button>
					  </span>
					</div><!-- /input-group -->
				  </div><!-- /.col-lg-6 -->
				</div><!-- /.row -->
				</form>
				
			</div>
		  </div>
		</div>
	  </section>
	  
	  <section id="site-hosting">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
					
				<div class="row">
					<div class="col-sm-12">
						<h1>Hosting</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						Shared
					</div>
					<div class="col-sm-3">
						VPS
					</div>
					<div class="col-sm-3">
						Dedicated
					</div>
					<div class="col-sm-3">
						Email
					</div>
				</div>
				
			</div>
		  </div>
		</div>
	  </section>
	  
	  <section id="site-design">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				
				<div class="row">
					<div class="col-sm-6">
						
						<div class="row">
							<div class="col-xs-4">
								<div class="row">
									<div class="col-sm-12">
										<img class="img-responsive" src="img/logos/shirlock_350x350.png" style="margin-top:15px;margin-bottom:15px;">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<img class="img-responsive" src="img/logos/outlaw_350x350.png" style="margin-top:15px;margin-bottom:15px;">
									</div>
								</div>
							</div>
							<div class="col-xs-8">
								<img class="img-responsive" src="img/logos/taraloka_600x600.png" style="margin-top:15px;margin-bottom:15px;">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<img class="img-responsive" src="img/logos/asm_600x166.png" style="margin-top:15px;margin-bottom:15px;">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<img class="img-responsive" src="img/logos/antiquarians_600x166.png" style="margin-top:15px;margin-bottom:15px;">
							</div>
						</div>
						
					</div>
					<div class="col-sm-6">
						
						<div class="row">
							<div class="col-xs-12">
								<img class="img-responsive" src="img/logos/benjaminbaxton_600x150.png" style="margin-top:15px;margin-bottom:15px;">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-8">
										<img class="img-responsive" src="https://placehold.it/600x930&text=Wellness" style="margin-top:15px;margin-bottom:15px;">
									</div>
									<div class="col-xs-4">
										
										<div class="row">
											<div class="col-sm-12">
												<img class="img-responsive" src="img/logos/coldlifestorage_350x350.png" style="margin-top:15px;margin-bottom:15px;">
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<img class="img-responsive" src="https://placehold.it/600x600&text=FlopFeet" style="margin-top:15px;margin-bottom:15px;">
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<img class="img-responsive" src="https://placehold.it/600x600&text=Tisdale" style="margin-top:15px;margin-bottom:15px;">
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				
			</div>
		  </div>
		</div>
	  </section>
	  
	  <section id="site-services">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				
				<div class="row">
					<div class="col-sm-12">
						<h1>Services</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4">
						
						<div class="list-group">
						  <a href="#" class="list-group-item active">App Development</a>
						  <a href="#" class="list-group-item">Software Engineering</a>
						  <a href="#" class="list-group-item">IT/Networking</a>
						  <a href="#" class="list-group-item">Consultation</a>
						</div>
						
					</div>
					<div class="col-sm-8">
						Description
					</div>
				</div>
				
			</div>
		  </div>
		</div>
	  </section>
	  
	  <section id="site-support">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				
				<div class="row">
					<div class="col-sm-12">
						<h1>Support</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						
						$100 1-Hour Quickstart
						
					</div>
					<div class="col-sm-6">
						Call, Email, Chat, Tickets, Forums, Knowledgebase, Form below
					</div>
				</div>
				
			</div>
		  </div>
		</div>
	  </section>
	  
	  <section id="site-contact">
        <div class="container">
		  <div class="row">
		    <div class="col-sm-6 col-sm-offset-6 well">
			  <div class="row">
			    <div class="col-sm-12">
				  <h2>Let's Get Started</h2>
				  <p>Fill out the following form, or <a href="mailto:contact@nihil.co">email us directly</a>, with as much detail as possible to get started on your new project today.</p>
				</div>
			  </div>
			  
			  <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
				<div class="row">
				  <div class="col-sm-6">
				    <?= $form->field($model, 'name') ?>
				  </div>
				  <div class="col-sm-6">
				    <?= $form->field($model, 'email') ?>
				  </div>
				</div>
				<div class="row">
				  <div class="col-sm-12">
				    <?= $form->field($model, 'subject') ?>
				  </div>
				</div>
				<div class="row">
				  <div class="col-sm-12">
				    <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>
				  </div>
				</div>
				<div class="row">
				  <div class="col-sm-12">
				    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
						'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
					]) ?>
				  </div>
				</div>
				<div class="row">
				  <div class="col-sm-12">
				    <?= Html::submitButton('Send Message', ['class' => 'btn btn-primary pull-right', 'name' => 'contact-button']) ?>
				  </div>
				</div>
			  <?php ActiveForm::end(); ?>  
				
			</div>
		  </div>
		</div>
	  </section>