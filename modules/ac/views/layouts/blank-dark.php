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
	
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>

</head>
<body class="blank-dark">

<?php $this->beginBody() ?>
	
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
							<li><a href="' . \Yii::$app->urlManager->createUrl(['dashboard']) . '"><i class="fa fa-tachometer"></i> dashboard</a></li>
							<li><a href="' . \Yii::$app->urlManager->createUrl(['settings']) . '"><i class="fa fa-gear"></i> settings</a></li>
							<li><a href="' . \Yii::$app->urlManager->createUrl(['logout']) . '"><i class="fa fa-sign-out"></i> logout</a></li>
						  </ul>
						</div>';
					}else{
						echo '<li><a class="btn btn-link" href="' . \Yii::$app->urlManager->createUrl(['login']) . '">Login</a></li>';
					    echo '<li><a class="btn btn-primary" href="' . \Yii::$app->urlManager->createUrl(['signup']) . '">Sign Up</a></li>';
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
					  <a class="navbar-brand" href="<?php echo Yii::$app->homeUrl; ?>"><img class="img-responsive" src="/img/nihil-logo.png" alt="The NIHIL Corporation" /></a>
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