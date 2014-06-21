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
    <meta name="author" content="Phalcon Team">
    <meta name="description" content="Your invoices">
	<?= Html::csrfMetaTags() ?>
		
    <title><?= Html::encode($this->title) ?></title>
		
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
					<div class="col-md-12">
						
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
									['label' => 'About', 'url' => ['/site/about']],
									['label' => 'Books', 'url' => ['/media/books']],
									['label' => 'Tutorials', 'url' => ['/cms/tutorials']],
									['label' => 'Contact', 'url' => ['/site/contact']],
								],
							]);
							echo Nav::widget([
								'options' => ['class' => 'navbar-nav navbar-right'],
								'items' => [
									Yii::$app->user->isGuest ?
										['label' => 'Login', 'url' => ['/ac/users/login']] :
										['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
											'url' => ['/ac/users/logout'],
											'linkOptions' => ['data-method' => 'post']],
								],
							]);
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
				<div class="col-md-6">
					<p class="footer-copyright">Copyright &copy; 2005-<?= date('Y') ?> <b>u<span>clemmer</span></b>. All rights reserved.</p>
				</div>
				<div class="col-md-6 text-right">
					<p>Powered by <a href="https://www.nihil.co" alt="The NIHIL Corporation">NIHIL</a>.</p>
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

    ga('create', 'UA-2228318-7', 'uclemmer.com');
    ga('send', 'pageview');

  </script>
  <?php
    }
  ?>
  
  </body>
</html>
<?php $this->endPage() ?>
