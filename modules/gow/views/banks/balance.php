<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' | Home';

$stone = 0;
$wood = 0;
$food = 0;
$ore = 0;
$silver = 0;

foreach ($players as $player) {
  $stone += $player->stone;
  $wood += $player->wood;
  $food += $player->food;
  $ore += $player->ore;
  $silver += $player->silver;
}
?>

			  <div class="row">
			    <div class="col-xs-12">
					<h1 class="page-header">My Balance</h1>
				</div>
			  </div>
			  
			  <div class="row">
			    <div class="col-sm-2 col-sm-offset-1 text-center stone-dblock">
				  <h1><?php echo number_format($stone, 0, ".", ","); ?></h1>
				  <h2>Stone</h2>
				</div>
				<div class="col-sm-2 text-center wood-dblock">
				  <h1><?php echo number_format($wood, 0, ".", ","); ?></h1>
				  <h2>Wood</h2>
				</div>
				<div class="col-sm-2 text-center food-dblock">
				  <h1><?php echo number_format($food, 0, ".", ","); ?></h1>
				  <h2>Food</h2>
				</div>
				<div class="col-sm-2 text-center ore-dblock">
				  <h1><?php echo number_format($ore, 0, ".", ","); ?></h1>
				  <h2>Ore</h2>
				</div>
				<div class="col-sm-2 text-center silver-dblock">
				  <h1><?php echo number_format($silver, 0, ".", ","); ?></h1>
				  <h2>Silver</h2>
				</div>
			  </div>
			  
			  <div class="row">
			    <div class="col-xs-12">
					<h1 class="page-header">Player Breakdown</h1>
				</div>
			  </div>
			  
			  <div class="row">
			    <div class="col-xs-12">
					
					<div class="table-responsive">
					<table class="table table-striped">
					  <thead>
						<tr>
						  <th>#</th>
						  <th>Player</th>
						  <th class="stone-text text-center">Stone</th>
						  <th class="wood-text text-center">Wood</th>
						  <th class="food-text text-center">Food</th>
						  <th class="ore-text text-center">Ore</th>
						  <th class="silver-text text-center">Silver</th>
						</tr>
					  </thead>
					  <tbody>
						<?php 
						  $c = 0;
						  foreach($players as $player) { 
						    $c++;
						?>
						<tr>
						  <td><?php echo $c; ?></td>
						  <td><?php echo $player->name; ?></td>
						  <td class="stone-text text-center"><?php echo number_format($player->stone, 0, ".", ","); ?></td>
						  <td class="wood-text text-center"><?php echo number_format($player->wood, 0, ".", ","); ?></td>
						  <td class="food-text text-center"><?php echo number_format($player->food, 0, ".", ","); ?></td>
						  <td class="ore-text text-center"><?php echo number_format($player->ore, 0, ".", ","); ?></td>
						  <td class="silver-text text-center"><?php echo number_format($player->silver, 0, ".", ","); ?></td>
						</tr>
						<?php 
						  } 
						?>
					  </tbody>
					</table>
				  </div>
				  
				</div>
			  </div>