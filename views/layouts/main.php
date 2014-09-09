<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);
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
			echo '<style>#site-wrapper { margin: 0 auto -126px;  padding: 0 0 126px 0;} #site-footer{ height: 126px; }</style>';
		}
	?>
		
  </head>
  <body>
	<?php $this->beginBody() ?>
        <div id="site-wrapper">
	
		<header id="site-header">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						
						<?php
							NavBar::begin([
								'brandLabel' => 'u<span>clemmer</span>',
								'brandUrl' => Yii::$app->homeUrl,
								'options' => [
									'class' => 'navbar navbar-inverse',
								],
							]);
							
							echo Nav::widget([
								'options' => ['class' => 'navbar-nav navbar-left'],
								'items' => [
									['label' => 'About', 'url' => ['/pages/about']],
									['label' => 'Blog', 'url' => ['/blog']],
									['label' => 'Tutorials', 'url' => ['/tutorials']],
									['label' => 'Contact', 'url' => ['/contact']],
								],
							]);
							
							if(Yii::$app->user->isGuest) {
								echo '<ul class="nav navbar-nav navbar-right">
								  <!--<li><a href="/ac/support/chat"><i class="fa fa-comment"></i></a></li>-->
								  <li><a href="/login">Login</a></li>
								</ul>';
							}else{
								echo '<ul class="nav navbar-nav navbar-right">
								  <!--<li><a href="/ac/support/chat"><i class="fa fa-comment"></i></a></li>-->
								  <li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="#" alt="user" /> '.Yii::$app->user->identity->username.' <b class="caret"></b></a>
									<ul class="dropdown-menu">
									  <li><a href="/ac/users"><i class="fa fa-user"></i> Portal</a></li>
									  <li><a href="/ac/users/settings"><i class="fa fa-gear"></i> Settings</a></li>
									  <li><a href="/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
									</ul>
								  </li>
								</ul>';
							}
							
							NavBar::end();
						?>
						
					</div>
				</div>
			</div>
		</header>
		
		<?= $content ?>
	
	</div>
	
	<footer id="site-footer">
		<div class="container">
			<div class="row footer-info">
				<div class="col-sm-7 col-md-6">
					<p class="footer-copyright">Copyright &copy; 2005-<?= date('Y') ?> <b>u<span>clemmer</span></b>. All rights reserved.</p>
				</div>
				<div class="col-sm-5 col-md-6 text-right">
					<p>Powered by <a href="http://www.nihil.co" alt="The NIHIL Corporation" target="_blank">NIHIL</a>.</p>
				</div>
			</div>
		</div>
	</footer>        

  <?php $this->endBody() ?>
  
  <?php
    if(!YII_DEBUG) {
  ?>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-2228318-7', 'auto');
    ga('send', 'pageview');

  </script>
  <?php
    }
  ?>
  
  </body>
</html>
<?php $this->endPage() ?>
