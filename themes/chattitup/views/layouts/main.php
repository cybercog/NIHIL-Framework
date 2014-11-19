<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\NihilAsset;

/* @var $this \yii\web\View */
/* @var $content string */

NihilAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
	<link rel="icon" type="image/ico" href="<?php echo \Yii::$app->homeUrl; ?>favicon/favicon.ico">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
	
	<script>
		window.setTimeout(function() { $(".alert-flash").alert('close'); }, 5000);
	</script>
	
	<style>
		<?php
			$maps = array('atlanta', 'chattanooga', 'hartford', 'lexington', 'newhaven');
			echo '#site-contact { background-image: url("../img/maps/' . $maps[rand(0, count($maps) - 1)] . '.png"); }';
			
			if(YII_DEBUG) {
				echo '#site-wrapper { margin: 0 auto -388px;  padding: 0 0 388px 0;} #site-footer{ height: 388px; }';
				echo '@media (max-width: 767px) { #site-wrapper { margin: 0 auto -734px;  padding: 0 0 734px 0;} #site-footer{ height: 734px; } }';
			}
		?>
	</style>

</head>
<body>

<?php $this->beginBody() ?>
    <div id="site-wrapper">
	
	  <header id="site-header">
        
		<div class="container-fluid" id="site-header-tophat-wrapper">
		  <div class="container">
            <div class="row" id="site-header-tophat">
		      <div class="col-sm-6">
				
				<ul class="list-inline">
				  <li><a class="btn btn-link" href="tel:14232905391"><i class="fa fa-phone"></i> </a> <a class="btn btn-link" href="mailto:contact@nihil.co"><i class="fa fa-envelope"></i> </a> Contact us today!</li>
				</ul>
			
			  </div>
			  <div class="col-sm-6">
				
				<ul class="list-inline pull-right">
				  <li><a class="btn btn-link" href="<?php echo \Yii::$app->urlManager->createUrl(['ecom/orders/cart']); ?>"><i class="fa fa-shopping-cart"></i> (0) $0.00</a></li>
				  <li><a class="btn btn-link" href="<?php echo \Yii::$app->urlManager->createUrl(['support/chat']); ?>"><i class="fa fa-comment"></i></a></li>
				  <li><a class="btn btn-link" href="<?php echo \Yii::$app->urlManager->createUrl(['core/search']); ?>"><i class="fa fa-search"></i></a></li>
				  
				  <?php 
					if(!Yii::$app->user->isGuest) {
						if(\Yii::$app->user->can('administrator')) {
							echo '<!-- Single button -->
								<div class="btn-group">
								  <a href="#" class="btn btn-link dropdown-toggle" data-toggle="dropdown">
									Admin <span class="caret"></span>
								  </a>
								  <ul class="dropdown-menu" role="menu">
									<li class="dropdown-submenu">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shield"></i> Access Control</a>
										<ul class="dropdown-menu">
											<li class="dropdown-submenu">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Users</a>
												<ul class="dropdown-menu">
													<li><a href="#"><i class="fa fa-tachometer"></i> Dashboard</a></li>
													<li><a href="#"><i class="fa fa-plus"></i> Create</a></li>
												</ul>
											</li>
											<li><a href="#"><i class="fa fa-users"></i> Groups</a></li>
										</ul>
									</li>
									<li class="dropdown-submenu">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cube"></i> Content Management</a>
										<ul class="dropdown-menu">
											<li class="dropdown-submenu">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file-text-o"></i> Pages</a>
												<ul class="dropdown-menu">
													<li><a href="#"><i class="fa fa-tachometer"></i> Dashboard</a></li>
													<li><a href="#"><i class="fa fa-plus"></i> Create</a></li>
												</ul>
											</li>
											<li class="dropdown-submenu">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-thumb-tack"></i> Posts</a>
												<ul class="dropdown-menu">
													<li><a href="#"><i class="fa fa-tachometer"></i> Dashboard</a></li>
													<li><a href="#"><i class="fa fa-plus"></i> Create</a></li>
												</ul>
											</li>
											<li><a href="#"><i class="fa fa-link"></i> Links</a></li>
											<li><a href="#"><i class="fa fa-wrench"></i> Projects</a></li>
										</ul>
									</li>
									<li class="dropdown-submenu">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-building"></i> Domains</a>
										<ul class="dropdown-menu">
											<li class="dropdown-submenu">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-university"></i> Registered Domains</a>
												<ul class="dropdown-menu">
													<li><a href="#"><i class="fa fa-tachometer"></i> Dashboard</a></li>
													<li><a href="#"><i class="fa fa-plus"></i> Create</a></li>
												</ul>
											</li>
											<li><a href="#">TLDs</a></li>
										</ul>
									</li>
									<li class="dropdown-submenu">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cloud"></i> Hosting</a>
										<ul class="dropdown-menu">
											<li><a href="#">Dashboard</a></li>
										</ul>
									</li>
									<li class="dropdown-submenu">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i> Ecom</a>
										<ul class="dropdown-menu">
											<li class="dropdown-submenu">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-university"></i> Invoices</a>
												<ul class="dropdown-menu">
													<li><a href="' . \Yii::$app->urlManager->createUrl(['ecom/invoices']) . '"><i class="fa fa-tachometer"></i> Dashboard</a></li>
													<li><a href="' . \Yii::$app->urlManager->createUrl(['ecom/invoices/create']) . '"><i class="fa fa-plus"></i> Create</a></li>
												</ul>
											</li>
											<li><a href="#">Orders</a></li>
											<li><a href="#">Products</a></li>
										</ul>
									</li>
									<li class="dropdown-submenu">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-support"></i> Support</a>
										<ul class="dropdown-menu">
											<li><a href="#"><i class="fa fa-question-circle"></i> FAQs</a></li>
											<li><a href="#"><i class="fa fa-graduation-cap"></i> Knowledge Base</a></li>
											<li><a href="#">Forums</a></li>
											<li class="dropdown-submenu">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ticket"></i> Tickets</a>
												<ul class="dropdown-menu">
													<li><a href="' . \Yii::$app->urlManager->createUrl(['support/tickets']) . '"><i class="fa fa-tachometer"></i> Dashboard</a></li>
													<li><a href="' . \Yii::$app->urlManager->createUrl(['support/tickets/create']) . '"><i class="fa fa-plus"></i> Create</a></li>
												</ul>
											</li>
										</ul>
									</li>
								  </ul>
								</div>';
						}
					    echo '<!-- Single button -->
						<div class="btn-group">
						  <a href="#" class="btn btn-link dropdown-toggle" data-toggle="dropdown">
							Welcome ' . Yii::$app->user->identity->nickname . ' <span class="caret"></span>
						  </a>
						  <ul class="dropdown-menu" role="menu">
							<li class="dropdown-header">' . \Yii::$app->user->identity->email . '<br />#' . \Yii::$app->user->identity->id . '</li>
							<li class="divider"></li>
							<li><a href="' . \Yii::$app->urlManager->createUrl(['ac/users']) . '"><i class="fa fa-home"></i> overview</a></li>
							<li><a href="' . \Yii::$app->urlManager->createUrl(['ac/users/settings']) . '"><i class="fa fa-gear"></i> settings</a></li>
							<li><a href="' . \Yii::$app->urlManager->createUrl(['ac/users/logout']) . '"><i class="fa fa-sign-out"></i> logout</a></li>
						  </ul>
						</div>';
					}else{
						echo '<li><a class="btn btn-link" href="' . \Yii::$app->urlManager->createUrl(['ac/users/login']) . '">Login</a></li>';
					    echo '<li><a class="btn btn-primary" href="' . \Yii::$app->urlManager->createUrl(['ac/users/register']) . '">Register</a></li>';
					}
				  ?>
				  
				</ul>
				
			  </div>
		    </div>
		  </div>
		</div>
		<div class="container-fluid" id="site-header-navigation-wrapper">
		  <div class="container">
		    <div class="row" id="site-header-navigation">
		      <div class="col-xs-12">
				
				<nav class="navbar navbar-default" role="navigation">
				  <div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="<?php echo Yii::$app->homeUrl; ?>">Chattitup</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  <ul class="nav navbar-nav navbar-right">
					    <li><a href="<?php echo \Yii::$app->urlManager->createUrl(['domains']); ?>">Domains</a></li>
						<li><a href="<?php echo \Yii::$app->urlManager->createUrl(['hosting']); ?>">Hosting</a></li>
						<li><a href="<?php echo \Yii::$app->urlManager->createUrl(['design']); ?>">Design</a></li>
						<li><a href="<?php echo \Yii::$app->urlManager->createUrl(['services']); ?>">Services</a></li>
						<li><a href="<?php echo \Yii::$app->urlManager->createUrl(['support']); ?>">Support</a></li>
					  </ul>
					</div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
				
			  </div>
		    </div>
		  </div>
		</div>
      </header><!-- /#site-header -->
	  
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
	  
	  <?= $content ?>
	
	</div><!-- /#site-wrapper -->
	
	<footer id="site-footer">

	  <div class="container-fluid">
	    <div class="row" id="site-footer-social">
		    <div class="col-sm-12">
		    
			  <nav>
			    <div class="container">
			      <div class="btn-group btn-group-justified">
			        <div class="btn-group">
			  	      <a href="https://www.facebook.com/nihilco" class="btn btn-lg btn-default" id="nav-social-facebook" target="_blank"><i class="fa fa-4x fa-facebook"></i></a>
			        </div>
			        <div class="btn-group">
				      <a href="https://twitter.com/nihilco" class="btn btn-lg btn-default" id="nav-social-twitter" target="_blank"><i class="fa fa-4x fa-twitter"></i></a>
			        </div>
			        <div class="btn-group">
				      <a href="#" class="btn btn-lg btn-default" id="nav-social-googleplus" target="_blank"><i class="fa fa-4x fa-google-plus"></i></a>
			        </div>
			        <div class="btn-group">
				      <a href="https://github.com/nihilco" class="btn btn-lg btn-default" id="nav-social-github" target="_blank"><i class="fa fa-4x fa-github"></i></a>
			        </div>
					<div class="btn-group">
				      <a href="mailto:contact@nihil.co" class="btn btn-lg btn-default" id="nav-social-mailinglist" target="_blank"><i class="fa fa-4x fa-envelope"></i></a>
			        </div>
			      </div>
			    </div>
			  </nav>
			
	        </div>
		</div>
	  </div>
	
	  <div class="container-fluid" id="site-footer-navigation-wrapper">
	    <div class="container">
	      <div class="row" id="site-footer-navigation">
		    <div class="col-sm-12">
		      
			  <div class="row">
			    <div class="col-sm-2 col-xs-4">
				  <h4><a href="<?php echo \Yii::$app->urlManager->createUrl(['domains']); ?>">Domains</a></h4>
				  <ul class="list-unstyled">
				    <li><a href="<?php echo \Yii::$app->urlManager->createUrl(['domains/register']); ?>">Register</a></li>
				    <li><a href="<?php echo \Yii::$app->urlManager->createUrl(['domains/transfer']); ?>">Transfer</a></li>
					<li><a href="<?php echo \Yii::$app->urlManager->createUrl(['domains/tlds-list']); ?>">TLDs List</a></li>
					<li><a href="<?php echo \Yii::$app->urlManager->createUrl(['domains/whois']); ?>">Whois</a></li>
				  </ul>
				</div>
				<div class="col-sm-2 col-xs-4">
				  <h4><a href="<?php echo \Yii::$app->urlManager->createUrl(['hosting']); ?>">Hosting</a></h4>
				  <ul class="list-unstyled">
				    <li><a href="<?php echo \Yii::$app->urlManager->createUrl(['hosting/shared-hosting']); ?>">Shared Hosting</a></li>
				    <li><a href="<?php echo \Yii::$app->urlManager->createUrl(['hosting/vps-hosting']); ?>">VPS Hosting</a></li>
					<li><a href="<?php echo \Yii::$app->urlManager->createUrl(['hosting/dedicated-servers']); ?>">Dedicated Servers</a></li>
					<li><a href="<?php echo \Yii::$app->urlManager->createUrl(['hosting/ssl-certificates']); ?>">SSL Certificates</a></li>
					<li><a href="<?php echo \Yii::$app->urlManager->createUrl(['hosting/private-email']); ?>">Private Email</a></li>
				  </ul>
				</div>
				<div class="col-sm-2 col-xs-4">
				  <h4><a href="<?php echo \Yii::$app->urlManager->createUrl(['design']); ?>">Design</a></h4>
				  <ul class="list-unstyled">
				    <li><a href="<?php echo \Yii::$app->urlManager->createUrl(['design/wordpress-themes']); ?>">WordPress Themes</a></li>
				    <li><a href="<?php echo \Yii::$app->urlManager->createUrl(['design/responsive-websites']); ?>">Responsive Websites</a></li>
					<li><a href="<?php echo \Yii::$app->urlManager->createUrl(['design/corporate-imaging']); ?>">Corporate Imaging</a></li>
				  </ul>
				</div>
				<div class="col-sm-2 col-xs-4">
				  <h4><a href="<?php echo \Yii::$app->urlManager->createUrl(['consulting']); ?>">Services</a></h4>
				  <ul class="list-unstyled">
				    <li><a href="<?php echo \Yii::$app->urlManager->createUrl(['services/app-development']); ?>">App Development</a></li>
				    <li><a href="<?php echo \Yii::$app->urlManager->createUrl(['services/software-engineering']); ?>">Software Engineering</a></li>
					<li><a href="<?php echo \Yii::$app->urlManager->createUrl(['services/it-networking']); ?>">IT/Networking</a></li>
					<li><a href="<?php echo \Yii::$app->urlManager->createUrl(['services/consultations']); ?>">Consultations</a></li>
				  </ul>
				</div>
				<div class="col-sm-2 col-xs-4">
				  <h4><a href="<?php echo \Yii::$app->urlManager->createUrl(['support']); ?>">Support</a></h4>
				  <ul class="list-unstyled">
				    <li><a href="<?php echo \Yii::$app->urlManager->createUrl(['support/faqs']); ?>">FAQ's</a></li>
				    <li><a href="<?php echo \Yii::$app->urlManager->createUrl(['support/knowledge-base']); ?>">Knowledge Base</a></li>
					<li><a href="<?php echo \Yii::$app->urlManager->createUrl(['support/forums']); ?>">Forums</a></li>
					<li><a href="<?php echo \Yii::$app->urlManager->createUrl(['support/tickets']); ?>">Tickets</a></li>
				  </ul>
				</div>
				<div class="col-sm-2 col-xs-4">
				  <h4><a href="<?php echo \Yii::$app->urlManager->createUrl(['company']); ?>">Company</a></h4>
				  <ul class="list-unstyled">
				    <li><a href="<?php echo \Yii::$app->urlManager->createUrl(['company/about']); ?>">About</a></li>
				    <li><a href="<?php echo \Yii::$app->urlManager->createUrl(['company/blog']); ?>">Blog</a></li>
					<li><a href="<?php echo \Yii::$app->urlManager->createUrl(['company/careers']); ?>">Careers</a></li>
					<li><a href="<?php echo \Yii::$app->urlManager->createUrl(['company/data-center']); ?>">Data Center</a></li>
					<li><a href="<?php echo \Yii::$app->urlManager->createUrl(['contact']); ?>">Contact</a></li>
				  </ul>
				</div>
			  </div>
			  
		    </div>
	      </div>
		</div>
	  </div>
	  
	  
	  
	  <div class="container-fluid" id="site-footer-legal-wrapper">
	    <div class="container">
	      <div class="row" id="site-footer-legal">
		    <div class="col-sm-6" id="site-footer-legal-copyright">
		      Copyright &copy; 2010-<?php echo date("Y"); ?> The NIHIL Corporation.<br class="visible-xs-block" />  All rights reserved.<br class="visible-xs-block" /> <a href="<?php echo \Yii::$app->urlManager->createUrl(['legal/privacy']); ?>">Privacy</a> <a href="<?php echo \Yii::$app->urlManager->createUrl(['legal/terms']); ?>">Terms</a>
		    </div>
		    <div class="col-sm-6 text-right" id="site-footer-legal-navigation">
		      Powered by <a href="<?php echo Yii::$app->homeUrl; ?>">NIHIL</a>
		    </div>
	      </div>
		</div>
	  </div>
	  
	</footer><!-- /#site-footer -->

  <?php $this->endBody() ?>

  <?php
    if(!YII_DEBUG) {
  ?>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', '<?php echo \Yii::$app->params['googleUACode']; ?>', 'auto');
    ga('send', 'pageview');

  </script>
  <?php
    }
  ?>

</body>
</html>
<?php $this->endPage() ?>
