<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\DeadRabbitsAsset;

/* @var $this \yii\web\View */
/* @var $content string */

DeadRabbitsAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
	<link rel="icon" type="image/ico" href="<?php echo \Yii::$app->homeUrl; ?>favicon/dead_rabbits_favicon.ico">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
	
	<script>
		window.setTimeout(function() { $(".alert-flash").alert('close'); }, 5000);
	</script>
	
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>

</head>
<body>

<?php $this->beginBody() ?>
<div id="site-wrapper">
	
	  <header id="site-header">
        <div class="container-fluid">
          <div class="row">
		    <div class="col-xs-12">
			
			<nav class="navbar navbar-inverse" role="navigation">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="/"><img alt="(+dR) Dead Rabbits" src="/img/logos/dead_rabbits_25x25.png"></a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav">
					<li class="active"><a href="<?php echo \Yii::$app->urlManager->createUrl(['gow']); ?>">Home</a></li>
					<li class="dropdown">
						<a href="<?php echo \Yii::$app->urlManager->createUrl(['gow/bank']); ?>" class="dropdown-toggle" data-toggle="dropdown">Bank <span class="caret"></span></a>

					  <ul class="dropdown-menu" role="menu">
						<li><a href="<?php echo \Yii::$app->urlManager->createUrl(['gow/bank/alliance']); ?>">Alliance Bank</a></li>
						<li><a href="<?php echo \Yii::$app->urlManager->createUrl(['gow/bank/player']); ?>">Player Totals</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo \Yii::$app->urlManager->createUrl(['gow/bank/create-transaction']); ?>">Create Transaction</a></li>
						<?php if(Yii::$app->user->can('banker')) {
							echo '<li class="divider"></li><li><a href="' . \Yii::$app->urlManager->createUrl(['gow/bank/reconcile']) . '">Reconcile Accounts</a></li>';
						} ?>
					  </ul></li>
					<!--<li><a href="<?php echo \Yii::$app->urlManager->createUrl(['gow/forums']); ?>">Forums</a></li>-->
				  </ul>

				  <ul class="nav navbar-nav navbar-right">
					<?php 
					if(!Yii::$app->user->isGuest) {
					
					echo '<!--<li><p class="navbar-text stone-text">Stone: 0</p></li>
						  <li><p class="navbar-text wood-text">Wood: 0</p></li>
						  <li><p class="navbar-text food-text">Food: 0</p></li>
						  <li><p class="navbar-text ore-text">Ore: 0</p></li>
						  <li><p class="navbar-text silver-text">Silver: 0</p></li>-->
						  <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome ' . Yii::$app->user->identity->nickname . ' <span class="caret"></span></a>

						  <ul class="dropdown-menu" role="menu">
							<li class="dropdown-header">' . \Yii::$app->user->identity->email . '<br />#' . \Yii::$app->user->identity->id . '</li>
							<li class="divider"></li>
							<!--<li><a href="' . \Yii::$app->urlManager->createUrl(['ac/users']) . '"><i class="fa fa-home"></i> overview</a></li>-->
							<!--<li><a href="' . \Yii::$app->urlManager->createUrl(['ac/users/settings']) . '"><i class="fa fa-gear"></i> settings</a></li>-->
							<li><a href="' . \Yii::$app->urlManager->createUrl(['ac/users/logout']) . '"><i class="fa fa-sign-out"></i> logout</a></li>
						  </ul></li>';
					}else{
						echo '<li><a href="' . \Yii::$app->urlManager->createUrl(['ac/users/login']) . '">Login</a></li>';
					    echo '<li><a href="' . \Yii::$app->urlManager->createUrl(['ac/users/register']) . '">Register</a></li>';
					}
				  ?>
				  <li><a href="<?php echo \Yii::$app->urlManager->createUrl(['site/contact']); ?>"><i class="fa fa-question-circle"></i></a></li>
				  </ul>
				</div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
			
			</div>
		  </div>
		</div>
      </header>
		
	  <section id="site-content">
        <div class="container-fluid">
          <div class="row">
		    <div class="col-sm-3 col-md-2" id="site-content-left">
				side
			</div>
			<div class="col-sm-9 col-md-10" id="site-content-main">
			
			  <?php if (Yii::$app->session->hasFlash('success')) { ?>
			  <div class="alert alert-success alert-dismissible alert-flash" id="flashMessage" role="alert">
				  <!--<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
				  <strong><i class="fa fa-check-square"></i> Success:</strong> <?= Yii::$app->session->getFlash('success'); ?>
			  </div>
			  <?php }elseif (Yii::$app->session->hasFlash('warning')) { ?>
			  <div class="alert alert-warning alert-dismissible alert-flash" id="flashMessage" role="alert">
				  <!--<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
				  <strong><i class="fa fa-exclamation-triangle"></i> Warning:</strong> <?= Yii::$app->session->getFlash('warning'); ?>
			  </div>
			  <?php }elseif (Yii::$app->session->hasFlash('danger')) { ?>
			  <div class="alert alert-danger alert-dismissible alert-flash" id="flashMessage" role="alert">
				  <!--<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
				  <strong><i class="fa fa-exclamation-triangle"></i> Error:</strong> <?= Yii::$app->session->getFlash('danger'); ?>
			  </div>
			  <?php }elseif (Yii::$app->session->hasFlash('info')) { ?>
			  <div class="alert alert-info alert-dismissible alert-flash" id="flashMessage" role="alert">
				  <!--<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>-->
				  <strong><i class="fa fa-info-circle"></i> Info:</strong> <?= Yii::$app->session->getFlash('info'); ?>
			  </div>
			  <?php } ?>
			  
			  <?= $content ?>
				  
				
	  
			</div>
			
		</div>
	  </section>
	
	</div>
	
	<footer id="site-footer">
      <div class="container-fluid">
	    <div class="row">
		  <div class="col-xs-6">
			<p class="visible-xs-inline">&copy;</p><p class="hidden-xs">Copyright &copy; 2010-<?php echo date("Y"); ?> The NIHIL Corporation.  All rights reserved.</p> <a href="<?php echo \Yii::$app->urlManager->createUrl(['legal/privacy']); ?>">Privacy</a> <a href="<?php echo \Yii::$app->urlManager->createUrl(['legal/terms']); ?>">Terms</a>
		  </div>
		  <div class="col-xs-6 text-right">
		    Powered by <a href="<?php echo Yii::$app->homeUrl; ?>">NIHIL</a>
		  </div>
		</div>
	  </div>
	</div>

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