<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use yii\widgets\Breadcrumbs;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\models\ContactForm $model
 */
$this->title = Yii::$app->params['siteMeta']['title'] . ' | Contact';
$this->params['breadcrumbs'][] = 'Contact';
?>
		<!--
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
		-->
		
		<section id="site-content">
			<div class="container">
			
				<div class="row">
					<div class="col-sm-12">
						<h1>Contact</h1>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-6">
						
						<div class="row">
							<div class="col-sm-12">
							
								<div class="site-contact">
									

									<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

									<div class="alert alert-success">
										Thank you for contacting us. We will respond to you as soon as possible.
									</div>

									<?php else: ?>

									<p>
										Have questions, concerns, or comments?  Fill out the following form to contact us directly.  We want to hear from you.
									</p>

									<div class="row">
										<div class="col-sm-12">
											<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
												<?= $form->field($model, 'name') ?>
												<?= $form->field($model, 'email') ?>
												<?= $form->field($model, 'subject') ?>
												<?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>
												<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
													'template' => '<div class="row"><div class="col-lg-4">{image}</div><div class="col-lg-8">{input}</div></div>',
												]) ?>
												<div class="form-group">
													<?= Html::submitButton('contact', ['class' => 'btn btn-success btn-lg pull-right', 'name' => 'contact-button']) ?>
												</div>
											<?php ActiveForm::end(); ?>
										</div>
									</div>

									<?php endif; ?>
								</div>
							
							</div>
						</div>
					
					</div>
					<div class="col-sm-6" style="padding-top:15px;padding-bottom:10px;">
						
						<div class="row">
							<div class="col-xs-6">
								<address>
								  <strong class="font-green">The Taraloka Foundation</strong><br>
								  705 Northern Avenue<br />
								  Signal Mountain, TN 37377<br />
								</address>
							</div>
							<div class="col-xs-6">
								<address>
								  <strong class="font-green">The Sikkim Happiness Home</strong><br>
								  Gangtokk, Sikkim<br />
								  India<br />
								</address>
								</div>
						</div>
						
						<div class="row">
							<div class="col-xs-12">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1816976.7652512228!2d88.3752781973191!3d27.19456428542012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e6a56a5805eafb%3A0x73d6132c501c8f20!2sGangtok%2C+Sikkim%2C+India!5e0!3m2!1sen!2sus!4v1408766346518" width="100%" height="450" frameborder="0" style="border:0"></iframe>
							</div>
						</div>
						
						
						
					</div>
				</div>
				
				
			</div>
		</section>
