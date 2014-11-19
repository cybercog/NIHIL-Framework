<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' | Home';
?>

			  <div class="row">
			    <div class="col-xs-12">
					<h1 class="page-header">Alliance Bank</h1>
				</div>
			  </div>
			  
			  <div class="row">
			    <div class="col-xs-12">
					
				  <div class="row">
					<div class="col-sm-4">
					
							<script type="text/javascript">
							  google.load("visualization", "1", {packages:["corechart"]});
							  google.setOnLoadCallback(drawChart);
							  function drawChart() {
								var data = google.visualization.arrayToDataTable([
								  ['Resource', 'Total'],
								  ['Stone', 11000],
								  ['Wood', 12000],
								  ['Food', 20000],
								  ['Ore', 15000],
								  ['Silver', 9500]
								]);

								var options = {
								  legend:{position:'none'},
								  pieHole: 0.4,
								};

								var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
								chart.draw(data, options);
							  }
							</script>
						  <div id="donutchart" style="width: 100%; min-height: 500px;"></div>
					  
					</div>
					<div class="col-sm-8">
					  
					  <div class="row">
						<div class="col-xs-12">
							<script type="text/javascript">
							  google.load("visualization", "1", {packages:["corechart"]});
							  google.setOnLoadCallback(drawChart);
							  function drawChart() {
								var data = google.visualization.arrayToDataTable([
								  ['Date', 'Stone', 'Wood', 'Food', 'Ore', 'Silver'],
								  ['10/29/14', 0, 0, 0 , 0, 0],
								  ['10/30/14', 400, 300, 200, 150, 50],
								  ['10/31/14', 500, 400, 300, 200, 100],
								  ['11/01/14', 750, 600, 450, 300, 150],
								  ['11/02/14', 750, 600, 450, 300, 150],
								  ['11/03/14', 750, 600, 450, 300, 150],
								  ['11/04/14', 400, 300, 200, 150, 50],
								  ['11/05/14', 500, 400, 300, 200, 100],
								  ['11/07/14', 500, 400, 300, 200, 100],
								  ['11/08/14', 0, 0, 0, 0, 0],
								  ['11/09/14', 500, 400, 300, 200, 100],
								  ['11/10/14', 750, 600, 450, 300, 150],
								  ['11/11/14', 1200, 400, 300, 200, 300],
								  ['11/12/14', 750, 600, 450, 300, 150],
								  ['10/29/14', 0, 0, 0 , 0, 0],
								  ['10/30/14', 400, 300, 200, 150, 50],
								  ['10/31/14', 500, 400, 300, 200, 100],
								  ['11/01/14', 750, 600, 450, 300, 150],
								  ['11/02/14', 750, 600, 450, 300, 150],
								  ['11/03/14', 750, 600, 450, 300, 150],
								  ['11/04/14', 400, 300, 200, 150, 50],
								  ['11/05/14', 500, 400, 300, 200, 100],
								  ['11/07/14', 500, 400, 300, 200, 100],
								  ['11/08/14', 0, 0, 0, 0, 0],
								  ['11/09/14', 500, 400, 300, 200, 100],
								  ['11/10/14', 750, 600, 450, 300, 150],
								  ['11/11/14', 1200, 400, 300, 200, 300],
								  ['11/12/14', 750, 600, 450, 300, 150]
								]);

								var options = {
								  legend:{position:'none'},
								  hAxis: { titleTextStyle: {color: '#333'}},
								  vAxis: {minValue: 0}
								};

								var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
								chart.draw(data, options);
							  }
							</script>
							<div id="chart_div" style="width: 100%; min-height: 500px;"></div>
						</div>
					  </div>
					
					</div>
				  </div>
				  
				</div>
			  </div>
			  
			  <div class="row">
			    <div class="col-sm-2 col-sm-offset-1 text-center stone-dblock">
				  <h1>0</h1>
				  <h2>Stone</h2>
				</div>
				<div class="col-sm-2 text-center wood-dblock">
				  <h1>0</h1>
				  <h2>Wood</h2>
				</div>
				<div class="col-sm-2 text-center food-dblock">
				  <h1>0</h1>
				  <h2>Food</h2>
				</div>
				<div class="col-sm-2 text-center ore-dblock">
				  <h1>0</h1>
				  <h2>Ore</h2>
				</div>
				<div class="col-sm-2 text-center silver-dblock">
				  <h1>0</h1>
				  <h2>Silver</h2>
				</div>
			  </div>
			  
			  <div class="row">
			    <div class="col-xs-12">
					<h1 class="page-header">Alliance Bank Logs</h1>
				</div>
			  </div>
			  
			  <div class="row">
			    <div class="col-xs-12">
					
					<div class="table-responsive">
					<table class="table table-striped">
					  <thead>
						<tr>
						  <th>#</th>
						  <th>Date</th>
						  <th>Player</th>
						  <th class="stone-text text-center">Stone</th>
						  <th class="wood-text text-center">Wood</th>
						  <th class="food-text text-center">Food</th>
						  <th class="ore-text text-center">Ore</th>
						  <th class="silver-text text-center">Silver</th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <td>10</td>
						  <td>11/12/14</td>
						  <td>NIHIL Nemo</td>
						  <td class="stone-text text-center">0</td>
						  <td class="wood-text text-center">0</td>
						  <td class="food-text text-center">0</td>
						  <td class="ore-text text-center">0</td>
						  <td class="silver-text text-center">0</td>
						</tr>
						<tr>
						  <td>9</td>
						  <td>11/12/14</td>
						  <td>NIHIL Nemo</td>
						  <td class="stone-text text-center">0</td>
						  <td class="wood-text text-center">0</td>
						  <td class="food-text text-center">0</td>
						  <td class="ore-text text-center">0</td>
						  <td class="silver-text text-center">0</td>
						</tr>
						<tr>
						  <td>8</td>
						  <td>11/12/14</td>
						  <td>NIHIL Nemo</td>
						  <td class="stone-text text-center">0</td>
						  <td class="wood-text text-center">0</td>
						  <td class="food-text text-center">0</td>
						  <td class="ore-text text-center">0</td>
						  <td class="silver-text text-center">0</td>
						</tr>
						<tr>
						  <td>7</td>
						  <td>11/11/14</td>
						  <td>NIHIL Nemo</td>
						  <td class="stone-text text-center">0</td>
						  <td class="wood-text text-center">0</td>
						  <td class="food-text text-center">0</td>
						  <td class="ore-text text-center">0</td>
						  <td class="silver-text text-center">0</td>
						</tr>
						<tr>
						  <td>6</td>
						  <td>11/11/14</td>
						  <td>NIHIL Nemo</td>
						  <td class="stone-text text-center">0</td>
						  <td class="wood-text text-center">0</td>
						  <td class="food-text text-center">0</td>
						  <td class="ore-text text-center">0</td>
						  <td class="silver-text text-center">0</td>
						</tr>
						<tr>
						  <td>5</td>
						  <td>11/10/14</td>
						  <td>NIHIL Nemo</td>
						  <td class="stone-text text-center">0</td>
						  <td class="wood-text text-center">0</td>
						  <td class="food-text text-center">0</td>
						  <td class="ore-text text-center">0</td>
						  <td class="silver-text text-center">0</td>
						</tr>
						<tr>
						  <td>4</td>
						  <td>11/10/14</td>
						  <td>NIHIL Nemo</td>
						  <td class="stone-text text-center">0</td>
						  <td class="wood-text text-center">0</td>
						  <td class="food-text text-center">0</td>
						  <td class="ore-text text-center">0</td>
						  <td class="silver-text text-center">0</td>
						</tr>
						<tr>
						  <td>3</td>
						  <td>11/09/14</td>
						  <td>NIHIL Nemo</td>
						  <td class="stone-text text-center">0</td>
						  <td class="wood-text text-center">0</td>
						  <td class="food-text text-center">0</td>
						  <td class="ore-text text-center">0</td>
						  <td class="silver-text text-center">0</td>
						</tr>
						<tr>
						  <td>2</td>
						  <td>11/09/14</td>
						  <td>NIHIL Nemo</td>
						  <td class="stone-text text-center">0</td>
						  <td class="wood-text text-center">0</td>
						  <td class="food-text text-center">0</td>
						  <td class="ore-text text-center">0</td>
						  <td class="silver-text text-center">0</td>
						</tr>
						<tr>
						  <td>1</td>
						  <td>11/09/14</td>
						  <td>NIHIL Nemo</td>
						  <td class="stone-text text-center">0</td>
						  <td class="wood-text text-center">0</td>
						  <td class="food-text text-center">0</td>
						  <td class="ore-text text-center">0</td>
						  <td class="silver-text text-center">0</td>
						</tr>
					  </tbody>
					</table>
				  </div>
				  
				</div>
			  </div>