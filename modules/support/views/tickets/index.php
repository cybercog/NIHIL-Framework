<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\support\models\search\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Tickets';
$this->params['breadcrumbs'][] = $this->title;
?>
	    <section id="support-tickets-banner">
        <div class="container-fluid">
          <div class="row">
		    <div class="col-xs-12">
				
				<div class="container">
					<div class="jumbotron">
						<h1>Need help?</h1>

						<p class="lead">Our electronic ticketing system makes it easy.</p>

						<p><a class="btn btn-lg btn-success" href="<?php echo \Yii::$app->urlManager->createUrl(['support/tickets/new']); ?>">Submit a ticket</a></p>
					</div>
				</div>
				
			</div>
		  </div>
		</div>
	  </section>
		
	  <section id="support-tickets-index">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Tickets') ?></h1>
			</div>
		  </div>
		  <div class="row">
		    <div class="col-sm-6">
			
				<ul class="nav nav-tabs" id="ticketsTabs" role="tablist">
				  <li class="active pull-right" style="margin-right:-2px;"><a href="#unresolved" data-toggle="tab">Unresolved</a></li>
				  <li class="pull-right"><a href="#resolved" data-toggle="tab">Resolved</a></li>
				  <li class="pull-right"><a href="#all" data-toggle="tab">All</a></li>
				</ul>
				
				<?php
				  $types = array(
					1 => array('name' => 'Bug', 'icon' => '<i class="fa fa-bug"></i>'),
					2 => array('name' => 'Improvement', 'icon' => '<i class="fa fa-level-up"></i>'),
					3 => array('name' => 'Epic Story', 'icon' => '<i class="fa fa-file-text"></i>'),
					4 => array('name' => 'Story', 'icon' => '<i class="fa fa-file-text-o"></i>'),
					5 => array('name' => 'Task', 'icon' => '<i class="fa fa-plus-square"></i>'),
					6 => array('name' => 'Technical', 'icon' => '<i class="fa fa-wrench"></i>'),
					7 => array('name' => 'New Feature', 'icon' => '<i class="fa fa-lightbulb-o"></i>'),
				  );
				  $statuses = array(
					1 => array('name' => 'New', 'label' => 'success'),
					2 => array('name' => 'Fixed', 'label' => 'primary'),
					3 => array('name' => 'In Progress', 'label' => 'warning'),
					4 => array('name' => 'Reopened', 'label' => 'info'),
					5 => array('name' => 'Open', 'label' => NULL),
					6 => array('name' => 'Closed', 'label' => 'default'),
				  );
				  $resolutions = array(
					1 => array('name' => 'Open', 'label' => NULL),
					2 => array('name' => 'Closed', 'label' => 'default'),
					3 => array('name' => 'Needs More Info', 'label' => 'warning'),
					4 => array('name' => 'Duplicate', 'label' => 'info'),
				  );
				  $priorities = array(
					1 => array('name' => 'Critical', 'icon' => '<i class="fa fa-exclamation-triangle"></i>', 'color' => 'red'),
					2 => array('name' => 'High', 'icon' => '<i class="fa fa-angle-double-up"></i>', 'color' => 'orange'),
					3 => array('name' => 'Medium', 'icon' => '<i class="fa fa-angle-up"></i>', 'color' => 'yellow'),
					4 => array('name' => 'Low', 'icon' => '<i class="fa fa-angle-down"></i>', 'color' => 'blue'),
					5 => array('name' => 'Trivial', 'icon' => NULL, 'color' => NULL),
				  );
				?>
				
				<div id='content' class="tab-content">
				  <div class="tab-pane active" id="unresolved">
				    <table class="table table-hover table-bordered">
					  <thead>
						<tr>
						  <th colspan="4">
							<ul class="list-inline pull-right" style="margin-bottom:0;">
							  <li><span class="label label-success">New: 0</span></li>
							  <li><span class="label label-primary">Fixed: 0</span></li>
							  <li><span class="label label-warning">In Progress: 0</span></li>
							  <li><span class="label label-total">Total: 0</span></li>
							</ul>
						  </th>
						</tr>
						<tr>
						  <th>#</th>
						  <th><i class="fa fa-filter"></i><!-- Type --></th>
						  <th><i class="fa fa-filter"></i><!-- Priority --></th>
						  <th>Name</th>
						</tr>
					  </thead>
					  <tbody>
					    <?php $count = 1; ?>
						<?php foreach($urModels as $ticket) { ?>
						<tr>
						  <td><?php echo $count; ?></td>
						  <td<?php if($priorities[$ticket->priority]['color']) { echo ' style="color: ' . $priorities[$ticket->priority]['color'] . ';"'; } ?>><?php echo $types[$ticket->type]['icon']; ?></td>
						  <td><?php echo $priorities[$ticket->priority]['icon']; ?></td>
						  <td><?php echo $ticket->name ?> <?php if($statuses[$ticket->status]['label']) { echo '<span class="label label-' . $statuses[$ticket->status]['label'] . '">' . $statuses[$ticket->status]['name'] . '</span>'; } ?></td>
						</tr>
						  <?php $count++; ?>
						<?php } ?>
					  </tbody>
					  <?php
					    if($urPages->pageCount > 1) {
					  ?>
							<tfoot>
							  <tr>
								<td colspan="4"><?php echo LinkPager::widget(['pagination' => $urPages]); ?></td>
							  </tr>
						    </tfoot>
					  <?php
						}
					  ?>
					  
					</table>
				  </div>
				  <div class="tab-pane" id="resolved">
				    <table class="table table-hover table-bordered">
					  <thead>
						<tr>
						  <th colspan="4">
							<ul class="list-inline pull-right" style="margin-bottom:0;">
							  <li><span class="label label-info">Duplicates: 0</span></li>
							  <li><span class="label label-default">Resolved: 0</span></li>
							  <li><span class="label label-total">Total: 0</span></li>
							</ul>
						  </th>
						</tr>
						<tr>
						  <th>#</th>
						  <th><i class="fa fa-filter"></i><!-- Type --></th>
						  <th><i class="fa fa-filter"></i><!-- Priority --></th>
						  <th>Name</th>
						</tr>
					  </thead>
					  <tbody>
					    <?php $count = 1; ?>
						<?php foreach($rModels as $ticket) { ?>
						<tr>
						  <td><?php echo $count; ?></td>
						  <td><?php echo $types[$ticket->type]['icon']; ?></td>
						  <td><?php echo $priorities[$ticket->priority]['icon']; ?></td>
						  <td><?php echo $ticket->name ?> <?php if($resolutions[$ticket->resolution]['label']) { echo '<span class="label label-' . $resolutions[$ticket->resolution]['label'] . '">' . $resolutions[$ticket->resolution]['name'] . '</span>'; } ?></td>
						</tr>
						  <?php $count++; ?>
						<?php } ?>
					  </tbody>
					  <?php
					    if($rPages->pageCount > 1) {
					  ?>
							<tfoot>
							  <tr>
								<td colspan="4"><?php echo LinkPager::widget(['pagination' => $rPages]); ?></td>
							  </tr>
						    </tfoot>
					  <?php
						}
					  ?>
					</table>
				  </div>
				  <div class="tab-pane" id="all">
				    <table class="table table-hover table-bordered">
					  <thead>
						<tr>
						  <th colspan="4">
							<ul class="list-inline pull-right" style="margin-bottom:0;">
							  <li><span class="label label-success">New: 0</span></li>
							  <li><span class="label label-primary">Fixed: 0</span></li>
							  <li><span class="label label-warning">In Progress: 0</span></li>
							  <li><span class="label label-info">Reopened: 0</span></li>
							  <li><span class="label label-open">Open: 0</span></li>
							  <li><span class="label label-default">Closed: 0</span></li>
							  <li><span class="label label-total">Total: 0</span></li>
							</ul>
						  </th>
						</tr>
						<tr>
						  <th>#</th>
						  <th><i class="fa fa-filter"></i><!-- Type --></th>
						  <th><i class="fa fa-filter"></i><!-- Priority --></th>
						  <th>Name</th>
						</tr>
					  </thead>
					  <tbody>
					    <?php $count = 1; ?>
						<?php foreach($aModels as $ticket) { ?>
						<tr>
						  <td><?php echo $count; ?></td>
						  <td><?php echo $types[$ticket->type]['icon']; ?></td>
						  <td><?php echo $priorities[$ticket->priority]['icon']; ?></td>
						  <td><?php echo $ticket->name ?> <?php if($statuses[$ticket->status]['label']) { echo '<span class="label label-' . $statuses[$ticket->status]['label'] . '">' . $statuses[$ticket->status]['name'] . '</span>'; } ?></td>
						</tr>
						  <?php $count++; ?>
						<?php } ?>
					  </tbody>
					  <?php
					    if($aPages->pageCount > 1) {
					  ?>
							<tfoot>
							  <tr>
								<td colspan="4"><?php echo LinkPager::widget(['pagination' => $aPages]); ?></td>
							  </tr>
						    </tfoot>
					  <?php
						}
					  ?>
					</table>
				  </div>
				</div>
				
			</div>
		  </div>
		</div>
	  </section>