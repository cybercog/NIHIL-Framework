<?php
/**
 * @var yii\web\View $this
 */
$this->title = 'uclemmer | Home';
?>

		<section id="site-jumbotron">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
		
						<div class="jumbotron">
							<h1>Order and Chaos</h1>

							<p class="lead">"Deep in the human unconscious is a pervasive need for a logical universe that makes sense. But the real universe is always one step beyond logic." ― Frank Herbert, Dune</p>

							<p><a class="btn btn-lg btn-default" href="/media/books">Check out some good reads</a></p>
						</div>
			
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

											<p><a class="btn btn-default read-more" href="/cms/projects/view/<?php echo $project->slug; ?>">Read More &raquo;</a></p>
										</div>
									<?php } ?>
								</div>

						</div>

			
					</div>
				</div>
			</div>
		</section>