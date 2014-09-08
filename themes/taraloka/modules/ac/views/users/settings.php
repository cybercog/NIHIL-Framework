<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ac\models\search\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Settings';
//$this->params['breadcrumbs'][] = array('label' => 'AC', 'url' => '/ac');
//$this->params['breadcrumbs'][] = array('label' => 'Users', 'url' => '/ac/users');
$this->params['breadcrumbs'][] = 'Settings';
?>
		<!--
		<section id="site-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
		
						<?= Breadcrumbs::widget([
							'homeLink' => [
								'label' => 'Home',
								'template' => "<li><a href='\'><i class='fa fa-home'></i></a></li>\n",
							],
							'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
						]) ?>
			
					</div>
				</div>
			</div>
		</section>
		-->
		
		<section id="site-content">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1>Settings</h1>
					</div>
				</div>
			
				<div class="row">
					<div class="col-sm-5">
							
						<div class="table-responsive">
						  <table class="table">
							<thead>
								<tr>
									<th colspan="2"><h2>Account Information <a href="#" class="pull-right">edit</a></h2></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>Username</th>
									<td><?php echo $user->username; ?></td>
								</tr>
								<tr>
									<th>Password</th>
									<td><a href="/change-password">change password</a></td>
								</tr>
								<tr>
									<th>Email</th>
									<td><?php echo $user->email; ?></td>
								</tr>
								<tr>
									<th>Nickname</th>
									<td><?php echo $user->nickname; ?></td>
								</tr>
								<tr>
									<th>Birthday</th>
									<td><?php echo $user->birthday; ?></td>
								</tr>
								<tr>
									<th>Credit</th>
									<td>$<?php echo $user->credit; ?> <a href="#">add</a></td>
								</tr>
							</tbody>
						  </table>
						</div>

					</div>
					<div class="col-sm-5 col-sm-offset-1">
					
						<div class="table-responsive">
						  <table class="table">
							<thead>
								<tr>
									<th colspan="2"><h2>Contact Information <a href="#" class="pull-right">edit</a></h2></th>
								</tr>
							</thead>
							<tbody>
							<?php if(isset($customer)) { ?>
								<tr>
									<th>Name</th>
									<td><?php echo $customer->first . ' ' . $customer->last; ?></td>
								</tr>
								<?php if(!empty($customer->company)) { echo '<tr><th>Company</th><td>' . $customer->company . '</td></tr>'; } ?>
								<tr>
									<th>Phone</th>
									<td><?php echo $customer->phone; ?></td>
								</tr>
								<tr>
									<th rowspan="<?php if(!empty($customer->address2)) { echo '3'; }else { echo '2'; } ?>">Address</th>
									<td><?php echo $customer->address1; ?></td>
								</tr>
								<?php if(!empty($customer->address2)) { echo '<tr><td>' . $customer->address2 . '</td></tr>'; } ?>
								<tr>
									<td><?php echo $customer->city . ', ' . $customer->state . ' ' . $customer->zipcode; ?></td>
								</tr>
								<tr>
									<th>Mailing Lists</th>
									<td><a href="#">manage</a></td>
								</tr>
							<?php }else { ?>
								<tr>
									<td>You do not have any contact information. Click the above button to edit.</td>
								</tr>
							<?php } ?>
							</tbody>
						  </table>
						</div>

					</div>
				</div>
			</div>
		</section>