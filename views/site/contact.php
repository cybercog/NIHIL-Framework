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
$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
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
					<div class="col-xs-12">
					
						<div class="visible-xs-block text-center" style="padding-top:15px;">
						<?php if(!YII_DEBUG) { ?>
							<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
							<!-- Test Mobile Banner -->
							<ins class="adsbygoogle"
								 style="display:inline-block;width:320px;height:50px"
								 data-ad-client="ca-pub-5089214589271094"
								 data-ad-slot="9365591705"></ins>
							<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
							</script>
						<?php }else{ ?>
							<img src="http://placehold.it/320x50&text=Ad" alt="Ad" />
						<?php } ?>
						</div>
					
					</div>
				</div>
			
				<div class="row">
					<div class="col-md-9">
						
						<div class="row">
							<div class="col-md-12">
							
								<div class="site-contact">
									<h1><?= Html::encode($this->title) ?></h1>

									<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

									<div class="alert alert-success">
										Thank you for contacting us. We will respond to you as soon as possible.
									</div>

									<p>
										Note that if you turn on the Yii debugger, you should be able
										to view the mail message on the mail panel of the debugger.
										<?php if (Yii::$app->mail->useFileTransport): ?>
										Because the application is in development mode, the email is not sent but saved as
										a file under <code><?= Yii::getAlias(Yii::$app->mail->fileTransportPath) ?></code>.
										Please configure the <code>useFileTransport</code> property of the <code>mail</code>
										application component to be false to enable email sending.
										<?php endif; ?>
									</p>

									<?php else: ?>

									<p>
										If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
									</p>

									<div class="row">
										<div class="col-md-6">
											<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
												<?= $form->field($model, 'name') ?>
												<?= $form->field($model, 'email') ?>
												<?= $form->field($model, 'subject') ?>
												<?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>
												<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
													'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
												]) ?>
												<div class="form-group">
													<?= Html::submitButton('Contact', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
												</div>
											<?php ActiveForm::end(); ?>
										</div>
									</div>

									<?php endif; ?>
								</div>
							
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								
								<div class="visible-xs-block text-center">
								<?php if(!YII_DEBUG) { ?>
									<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
									<!-- Test Mobile Large Block -->
									<ins class="adsbygoogle"
										 style="display:inline-block;width:336px;height:280px"
										 data-ad-client="ca-pub-5089214589271094"
										 data-ad-slot="6412125308"></ins>
									<script>
									(adsbygoogle = window.adsbygoogle || []).push({});
									</script>
								<?php }else{ ?>
									<img src="http://placehold.it/336x280&text=Ad" alt="Ad" />
								<?php } ?>
								</div>
							
							</div>
						</div>
					
					</div>
					<div class="col-sm-3" style="padding-top:15px;padding-bottom:10px;">
						
						<div class="hidden-xs">
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
				
				
			</div>
		</section>
