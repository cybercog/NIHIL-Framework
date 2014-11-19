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
  
  <div class="container">  
	<div class="row">
	  <div class="col-sm-12 text-center hidden-xs">
	    <img src="https://placehold.it/728x90" />
	  </div>
	  <div class="col-xs-12 text-center hidden-xl hidden-lg hidden-md hidden-sm">
	    <img src="https://placehold.it/320x100" />
	  </div>
	</div>
  </div>
			  
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

    ga('create', 'UA-2228318-29', 'auto');
    ga('send', 'pageview');

  </script>
  <?php
    }
  ?>

</body>
</html>
<?php $this->endPage() ?>