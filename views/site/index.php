<?php
/**
 * @var yii\web\View $this
 */
$this->title = 'uclemmer | Home';
$this->registerMetaTag(['description' => 'Uriah M. Clemmer IV is an Electrical Engineer by training, an application/network consultant by trade, and mechanic/blogger/gardener/reader by necessity.  This site is all about Uriah, his work, and his hobbies.']);
$this->registerMetaTag(['keywords' => 'uclemmer.com, uriah, clemmer, nihil, nihil corporation, tutorials, blog, books']);

$this->registerMetaTag(['og:title' => 'uclemmer.com']);
$this->registerMetaTag(['og:image' => 'http://www.uclemmer.com/favicon/600x600.png']);
$this->registerMetaTag(['og:url' => 'http://www.uclemmer.com']);
$this->registerMetaTag(['og:site_name' => 'uclemmer.com']);
$this->registerMetaTag(['og:type' => 'website']);
$this->registerMetaTag(['og:description' => 'Uriah M. Clemmer IV is an Electrical Engineer by training, an application/network consultant by trade, and mechanic/blogger/gardener/reader by necessity.  This site is all about Uriah, his work, and his hobbies.']);
?>
		
		<section id="site-jumbotron">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
		
						<div class="jumbotron">
							<h1>Order and Chaos</h1>

							<p class="lead">"Deep in the human unconscious is a pervasive need for a logical universe that makes sense. But the real universe is always one step beyond logic." ― Frank Herbert, Dune</p>

							<p><a class="btn btn-lg btn-default" href="/tutorials">Check out my tutorials</a></p>
						</div>
			
					</div>
					<div class="col-md-4" id="ad-jumbotron">
					
					<?php if(!YII_DEBUG) { ?>
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- uclemmer MedRec -->
						<ins class="adsbygoogle"
							 style="display:inline-block;width:300px;height:250px"
							 data-ad-client="ca-pub-5089214589271094"
							 data-ad-slot="3716231707"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					<?php }else{ ?>
						<img src="/img/Ad_300x250.gif" alt="Ad" />
					<?php } ?>
					
					</div>
				</div>
			</div>
		</section>
							

		<section id="site-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
		
						
						<div class="site-index">

								<div class="row">
									
								</div>

						</div>

			
					</div>
				</div>
			</div>
		</section>