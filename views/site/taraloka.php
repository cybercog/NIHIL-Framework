<?php
/**
 * @var yii\web\View $this
 */
$this->title = Yii::$app->params['siteMeta']['title'] . ' | Home';
$this->registerMetaTag(['description' => 'The Taraloka Foundation is a registered 501(c)3 organization creating opportunities for Himalayan girls by providing education, healthcare, and a safe refuge.']);
$this->registerMetaTag(['keywords' => 'uclemmer.com, uriah, clemmer, nihil, nihil corporation, tutorials, blog, books']);

$this->registerMetaTag(['og:title' => 'Taraloka Foundation']);
$this->registerMetaTag(['og:image' => 'http://www.taraloka.org/favicon/600x600.png']);
$this->registerMetaTag(['og:url' => 'http://www.taraloka.org']);
$this->registerMetaTag(['og:site_name' => 'taraloka.org']);
$this->registerMetaTag(['og:type' => 'website']);
$this->registerMetaTag(['og:description' => 'The Taraloka Foundation is a registered 501(c)3 organization creating opportunities for Himalayan girls by providing education, healthcare, and a safe refuge.']);
?>
		
		<!-- START: SITE BANNER -->
		<section id="site-banner">
			
			<div class="row">
			
				<!-- START: CTA SLIDER -->
				<div class="col-sm-12">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					  <!-- Indicators -->
					  <ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					  </ol>

					  <!-- Wrapper for slides -->
					  <div class="carousel-inner">
						<div class="item active">
						  <img src="<?php echo Yii::$app->homeUrl; ?>img/girls-waterfall.jpg" alt="Slide 1" />
						</div>
						<div class="item">
						  <img src="<?php echo Yii::$app->homeUrl; ?>img/girls-waterfall.jpg" alt="Slide 2" />
						</div>
					  </div>

					  <!-- Controls -->
					  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					  </a>
					  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					  </a>
					</div>
				</div>
				<!-- END: CTA SLIDER -->
				
			</div>
			
		</section>
		<!-- END: SITE BANNER -->