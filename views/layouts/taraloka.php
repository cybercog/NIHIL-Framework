<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\TaralokaAsset;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
TaralokaAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
  <head>
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?= $this->registerMetaTag(['author' => 'Uriah M. Clemmer IV']); ?>
	<?= Html::csrfMetaTags() ?>
		
    <title><?= Html::encode($this->title) ?></title>
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
		
	<?php $this->head() ?>
	
	<?php
		if(YII_DEBUG) {
			echo '<style>#site-wrapper { margin: 0 auto -398.5px;  padding: 0 0 398.5px 0;} #site-footer{ height: 398.5px; }</style>';
		}
	?>
		
  </head>
  <body>
	<?php $this->beginBody() ?>
    <!-- WRAP MAJORITY OF PAGE FOR STICKY FOOTER -->
	<!-- START: SITE WRAPPER -->
	<div id="site-wrapper">
		
		<!-- START: SITE HEADER -->
		<section id="site-header">
			<div class="container">
			
				<div class="row">
				
					<!-- START: HEADER LOGO -->
					<div class="col-sm-3 col-md-2">
						<a href="<?php echo Yii::$app->homeUrl; ?>"><img class="img-responsive" src="<?php echo Yii::$app->homeUrl; ?>img/taraloka-logo.png" alt="The Taraloka Foundation" /></a>
					</div>
					<!-- END: HEADER LOGO -->
					
					<!-- START: HEADER CONTACT -->
					<div class="col-sm-9 col-md-10" style="padding-right: 0;">
						<div class="row">
							<div class="col-sm-12 text-right">
								
						<?php 
							if(Yii::$app->user->isGuest) {
								echo '<a href="' . Yii::$app->homeUrl . 'register" class="btn btn-mystic">Register</a>
									<a href="' . Yii::$app->homeUrl . 'login" class="btn btn-mystic">Login</a>';
							}else{
								echo '<!-- Single button -->
								<div class="btn-group">
								  <a href="#" class="btn btn-mystic dropdown-toggle" data-toggle="dropdown">
									Welcome ' . Yii::$app->user->identity->username . ' <span class="caret"></span>
								  </a>
								  <ul class="dropdown-menu" role="menu">
									<li><a href="' . Yii::$app->homeUrl . 'ac/users"><i class="fa fa-user"></i> Portal</a></li>
									<li><a href="' . Yii::$app->homeUrl . 'ac/users/settings"><i class="fa fa-gear"></i> Settings</a></li>
									<li><a href="' . Yii::$app->homeUrl . 'logout"><i class="fa fa-sign-out"></i> Logout</a></li>
								  </ul>
								</div>';
							}
						?>	
								
							</div>
							<div class="col-sm-12 text-right">
								
								<!-- START: HEADER LOGO -->
								<nav class="navbar navbar-default" role="navigation" style="margin-top:51.4px;"><!-- 65.4 -->
									<div class="container-fluid">
										<!-- Brand and toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
												<span class="sr-only">Toggle navigation</span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
											</button>
										</div>

										<!-- Collect the nav links, forms, and other content for toggling -->
										<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
											<ul class="nav navbar-nav">
												<li><a href="<?php echo Yii::$app->homeUrl; ?>pages/mission">Mission</a></li>
												<li><a href="<?php echo Yii::$app->homeUrl; ?>pages/about">About</a></li>
												<li><a href="<?php echo Yii::$app->homeUrl; ?>pages/newsletters">Newsletters</a></li>
												<li><a href="<?php echo Yii::$app->homeUrl; ?>pages/partners">Partners</a></li>
												<li><a href="<?php echo Yii::$app->homeUrl; ?>shop">Shop</a></li>
												<li><a href="<?php echo Yii::$app->homeUrl; ?>contact">Contact</a></li>
												<li><a class="btn btn-default" id="navbar-btn" href="<?php echo Yii::$app->homeUrl; ?>donate">donate</a></li>
											</ul>
											
											
										</div><!-- /.navbar-collapse -->
									</div><!-- /.container-fluid -->
								</nav>
								<!-- END: HEADER LOGO -->
								
							</div>
						</div>
					</div>
					<!-- END: HEADER CONTACT -->
					
				</div>
			
			</div>
		</section>
		<!-- END: SITE HEADER -->
		
		<?= $content ?>
		
	</div>
	<!-- END: SITE WRAPPER -->
	
	<!-- EXCLUDE FOOTER FROM WRAPPER SO IT WILL STICK -->
	<!-- START: SITE FOOTER -->
	<div id="site-footer">
		
		<div id="footer-navigation">
			<div class="container">
			
				<div class="row">
				
					<!-- START: FOOTER NAVIGATION 1 -->
					<div class="col-sm-4">
						
						<div class="row">
							<div class="col-sm-12">
								
								<ul class="list-inline">
									<li><a href="<?php echo Yii::$app->homeUrl; ?>"><img src="<?php echo Yii::$app->homeUrl; ?>img/taraloka-wordmark.png" alt="Taraloka Foundation" style="width:150px;" /></a></li>
								</ul>
								
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<p><strong class="font-green">The Taraloka Foundation</strong> is a registered 501(c)3 organization creating opportunities for Himalayan girls by providing education, healthcare, and a safe refuge.</p>
								<p>[You can provide everything a girl needs for $2500/year, feed the whole house of 30 for $25/day, or pay our three employees for $100/week.  A dollar goes a long way, so make your donation today.]</p>
							</div>
						</div>
						
					</div>
					<!-- END: FOOTER NAVIGATION 1 -->
					
					<!-- START: FOOTER NAVIGATION 1 -->
					<div class="col-sm-2">
						
						<div class="row">
							<div class="col-sm-12 text-center">
								
								<ul class="list-unstyled" id="footer-menu">
									<li><a href="<?php echo Yii::$app->homeUrl; ?>pages/mission">mission</a></li>
									<li><a href="<?php echo Yii::$app->homeUrl; ?>pages/about">about</a></li>
									<li><a href="<?php echo Yii::$app->homeUrl; ?>pages/newsletters">newseltters</a></li>
									<li><a href="<?php echo Yii::$app->homeUrl; ?>pages/partners">partners</a></li>
									<li><a href="<?php echo Yii::$app->homeUrl; ?>shop">shop</a></li>
									<li><a href="<?php echo Yii::$app->homeUrl; ?>contact">contact</a></li>
									<li><a href="<?php echo Yii::$app->homeUrl; ?>donate" class="btn btn-default">donate</a></li>
								</ul>
								
								
							</div>
						</div>
						
					</div>
					<!-- END: FOOTER NAVIGATION 1 -->
					
					<!-- START: FOOTER NAVIGATION 2 -->
					<div class="col-sm-3">
						
						<div class="row">
							<div class="col-sm-6">
								<a href="#" data-toggle="modal" data-target="#footerPic1"><img src="<?php echo Yii::$app->homeUrl; ?>img/girl-1.png" class="img-responsive" alt="Girl 1" /></a>
								<!-- Modal -->
								<div class="modal fade" id="footerPic1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
									<div class="modal-content">
									  <div class="modal-body">
										<img src="<?php echo Yii::$app->homeUrl; ?>img/girl-1.png" class="img-responsive" alt="Girl 1" />
									  </div>
									</div>
								  </div>
								</div>
							</div>
							<div class="col-sm-6">
								<a href="#" data-toggle="modal" data-target="#footerPic2"><img src="<?php echo Yii::$app->homeUrl; ?>img/girl-2.png" class="img-responsive" alt="Girl 2" /></a>
								<!-- Modal -->
								<div class="modal fade" id="footerPic2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
									<div class="modal-content">
									  <div class="modal-body">
										<img src="<?php echo Yii::$app->homeUrl; ?>img/girl-2.png" class="img-responsive" alt="Girl 1" />
									  </div>
									</div>
								  </div>
								</div>
							</div>
						</div>
						<div class="row" style="margin-top:20px;">
							<div class="col-sm-6">
								<a href="#" data-toggle="modal" data-target="#footerPic3"><img src="<?php echo Yii::$app->homeUrl; ?>img/girl-3.png" class="img-responsive" alt="Girl 3" /></a>
								<!-- Modal -->
								<div class="modal fade" id="footerPic3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
									<div class="modal-content">
									  <div class="modal-body">
										<img src="<?php echo Yii::$app->homeUrl; ?>img/girl-3.png" class="img-responsive" alt="Girl 1" />
									  </div>
									</div>
								  </div>
								</div>
							</div>
							<div class="col-sm-6">
								<a href="#" data-toggle="modal" data-target="#footerPic4"><img src="<?php echo Yii::$app->homeUrl; ?>img/girl-4.png" class="img-responsive" alt="Girl 4" /></a>
								<!-- Modal -->
								<div class="modal fade" id="footerPic4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
									<div class="modal-content">
									  <div class="modal-body">
										<img src="<?php echo Yii::$app->homeUrl; ?>img/girl-4.png" class="img-responsive" alt="Girl 1" />
									  </div>
									</div>
								  </div>
								</div>
							</div>
						</div>
						
					</div>
					<!-- END: FOOTER NAVIGATION 2 -->
					
					<!-- START: FOOTER NAVIGATION 2 -->
					<div class="col-sm-3">
						
						<div class="row">
							<div class="col-sm-12" id="footer-contact">
								<h4>Contact Information</h4>
								
								<address>
								  <strong class="font-green">The Taraloka Foundation</strong><br>
								  705 Northern Avenue<br />
								  Signal Mountain, TN 37377<br />
								  <a href="tel:14236056163">+1.423.605.6163</a><br />
								  <a href="mailto:contact@taraloka.org">contact@taraloka.org</a>
								</address>
								
								<ul class="list-inline">
									<li><a href="#"><i class="fa fa-2x fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-2x fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-2x fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-2x fa-youtube"></i></a></li>
									<li><a href="#"><i class="fa fa-2x fa-envelope"></i></a></li>
								</ul>
							</div>
						</div>
						
					</div>
					<!-- END: FOOTER NAVIGATION 2 -->
					
				</div>
			
			</div>
		</div>
		<div id="footer-legal">
			<div class="container">
			
				<div class="row">
				
					<!-- START: FOOTER COPYRIGHT -->
					<div class="col-sm-6">
						<p>Copyright 214 &copy; <strong class="font-green">The Taraloka Foundation</strong>.  All rights reserved.</p>
					</div>
					<!-- END: FOOTER COPYRIGHT -->
					
					<!-- START: FOOTER POWERED -->
					<div class="col-sm-6 text-right">
						<p>Powered by <a href="http://www.nihil.co" target="_blank">NIHIL</a></p>
					</div>
					<!-- END: FOOTER POWERED -->
					
				</div>
			
			</div>
		</div>
			
	</div>
	<!-- END: SITE FOOTER --> 
		
  <?php $this->endBody() ?>
  
  <?php
    if(!YII_DEBUG) {
  ?>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-2228318-23', 'auto');
    ga('send', 'pageview');

  </script>
  <?php
    }
  ?>
  
  </body>
</html>
<?php $this->endPage() ?>
