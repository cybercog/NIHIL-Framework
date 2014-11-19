<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\ShirlockAsset;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
ShirlockAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <!-- START: site-wrapper -->
	<div id="site-wrapper">
	
		<!-- START: site-header -->
		<header id="site-header">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<a href="/"><img class="full" src="/img/shirlock-logo.png" title="The Shirlock Foundation" /></a>
					</div>
					<div class="col-md-9">
						
						<div class="row">
							<div class="col-sm-6 col-sm-offset-6">
							
								<div class="row">
									<div class="col-sm-12" id="goal-label">
										<p>Help us reach our goal</p>
									</div>
									<div class="col-sm-8">
									    <div class="row">
											<div class="col-sm-12">
												<div class="progress">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="67.68" aria-valuemax="100" style="width: 67.68%;">
														<span class="sr-only">67.68% Complete</span>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-5">
												Almost there
											</div>
											<div class="col-xs-7 text-right">
												$10152 of $15000
											</div>
										</div>
										
									</div>
									<div class="col-sm-4">
										<a class="btn btn-success btn-block btn-success-wb" href="/donate">Donate Now</a>
									</div>
								</div>
							
								
							
							</div>
						</div>
						<div class="row">
						
							<ul class="nav navbar-nav">
								<li class=""><a href="/about">About Us</a></li>
								<!--<li class=""><a href="/page/newsletters">Newsletters</a></li>-->
								<li class=""><a href="/resources">Resources</a></li>
								<li class=""><a href="/events">Events</a></li>
								<li class=""><a href="/store">Store</a></li>
								<li class=""><a href="/contact">Contact Us</a></li>
							</ul>
						
						</div>
						
					</div>
				</div>
			</div>
		</header>
		<!-- END: site-header -->
		
		<!-- START:  -->
		<div id="site-subheader">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-right">
						<ul class="list-inline" id="subnav">
							<li>&nbsp;</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- END:  -->
		
		<!-- START:  -->
		<div id="site-content">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						
						<div class="row" id="plea-box">
							<div class="col-md-12">
								<h3>The <strong>Shirlock Foundation</strong> is committed to financially assisting the families of college students who are battling cancer.</h3>
							</div>
							<div class="col-md-12">
								<p>When a loved one is in the hospital, a family's expenses extend beyond the cost of treatment alone.  The additional costs of travel, daycare, food, lodging, and parking, just to name a few, are many of the day-to-day expenses associated with treatment.  Frequently, parents find it necessary to take time off from work to focus fully on their child's care, cutting off a valuable source of income when the family needs it most.<p>
							</div>
							<div class="col-md-12">
								<p>Our goal is to help these families monetarily, so they can focus their efforts on supporting their loved one.<p>
							</div>
						</div>
						
						<div class="row" id="financials-box">
							<div class="col-md-12">
								<h4>How can you help?</h4>
							</div>
							<div class="col-md-12">
								<p>The <strong>Shirlock Foundation</strong> is a registered 501(c)3 and your donation is tax deductible.  Click the button below to make a donation online with our secure web form.</p>
							</div>
							<div class="col-md-12">
								<a class="btn btn-success btn-lg btn-block btn-success-wb" href="/donate">Donate Now</a>
							</div>
						</div>
						
					</div>
					<div class="col-sm-9">
						
						
						<div class="row">
							<div class="col-md-9">
								
								<!-- Include: Success stories, apply today. -->
								<?= $content ?>
		
							</div>
							<div class="col-md-3">
							
								<!-- Begin MailChimp Signup Form -->
								<div id="mc_embed_signup">
								<form action="http://shirlock.us8.list-manage.com/subscribe/post?u=306bb2803694fffbbd202b85a&amp;id=8e0d669cee" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
									<h4>Join Our Mailing List</h4>
									<p>Keep up-to-date with events, news, and any other important announcements.</p>
									<input type="email" value="" name="EMAIL" class="form-control" id="mce-EMAIL" placeholder="jsmith@example.com" required>
									<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
									<div style="position: absolute; left: -5000px;"><input type="text" name="b_306bb2803694fffbbd202b85a_8e0d669cee" tabindex="-1" value=""></div>
									<div class="clear"><input type="submit" value="Join" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary btn-block"></div>
								</form>
								</div>
								<!--End mc_embed_signup-->
							
								<!--
								<div class="row">
									<div class="col-md-12">
										<h4>Join Our Mailing List</h4>
										<p>We only send out semi-annual newsletters and other important announcements.</p>
									</div>
									<form>
										<div class="col-md-12">
											<div class="input-group">
												<input type="text" class="form-control" />
												<span class="input-group-btn">
													<button class="btn btn-primary" type="button">Join!</button>
												</span>
											</div>
										</div>
									</form>
								</div>
		
		
		
								<div class="row">
									<div class="col-md-12">
										<h4>Social</h4>
									</div>
									<div class="col-md-12">
										<ul class="list-inline">
											<li><a href="#"><i class="fa fa-facebook fa-3x"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter fa-3x"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus fa-3x"></i></a></li>
										</ul>
									</div>
								</div>
								-->
							</div>
						</div>						
					</div>
				</div>
			</div>
		</div>
		<!-- END:  -->
			
	</div>
	<!-- END: site-wrapper -->
	
	<!-- START: site-footer -->
	<footer id="site-footer">
		<div class="container">
			<div class="row text-center">
				<div class="col-md-12">
					
					<ul class="list-inline" id="footer-nav">
						<li class=""><a href="/about">About Us</a></li>
						<!--<li class=""><a href="/newsletters">Newsletters</a></li>-->
						<li class=""><a href="/resources">Resources</a></li>
						<li class=""><a href="/events">Events</a></li>
						<li class=""><a href="/store">Store</a></li>
						<li class=""><a href="/contact">Contact Us</a></li>
						<li class=""><a href="/donate" class="donate">Donate</a></li>
					</ul>
					
				</div>
			</div>
			<div class="row text-center">
				<div class="col-md-12">
					<ul class="list-inline" id="footer-subnav">
						<!--<li class=""><a href="/sitemap">Site Map</a></li>-->
						<li class=""><a href="/privacy">Privacy</a></li>
						<li class=""><a href="/terms">Terms</a></li>
					</ul>
				</div>
				<div class="col-md-12">
					<p id="footer-copyright">Copyright &copy; 2007 - 2014 The <strong>Shirlock Foundation</strong>. All rights reserved.</p>
				</div>
				<div class="col-md-12">
					<!--<p id="footer-powered">Powered by <a href="http://www.nihil.co" alt="The NIHIL Corporation" target="_blank">NIHIL</a>.</p>-->
				</div>
			</div>
		</div>
	</footer>
	<!-- END: site-footer -->


<?php $this->endBody() ?>

<?php if(!YII_DEBUG) { ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-2228318-14', 'shirlock.org');
  ga('send', 'pageview');

</script>
<?php } ?>

</body>
</html>
<?php $this->endPage() ?>
