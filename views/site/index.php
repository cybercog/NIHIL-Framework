<?php
/**
 * @var yii\web\View $this
 */
$this->title = 'uclemmer | Home';
?>

		<section id="site-jumbotron">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
		
						<div class="jumbotron">
							<h1>Order and Chaos</h1>

							<p class="lead">"Deep in the human unconscious is a pervasive need for a logical universe that makes sense. But the real universe is always one step beyond logic." ― Frank Herbert, Dune</p>

							<p><a class="btn btn-lg btn-default" href="/media/books">Check out some good reads</a></p>
						</div>
			
					</div>
					<div class="col-md-4" style="padding-top:68px;">
					
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
						<img src="http://placehold.it/300x250&text=Ad" alt="Ad" />
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
									<?php foreach($projects as $project) { ?>
										<div class="col-lg-4">
											<h2><?php echo $project->title; ?></h2>

											<p><?php echo $project->description; ?></p>

											<p><a class="btn btn-default read-more" href="/tutorials/<?php echo $project->slug; ?>">Read More &raquo;</a></p>
										</div>
									<?php } ?>
								</div>

						</div>

			
					</div>
				</div>
			</div>
		</section>