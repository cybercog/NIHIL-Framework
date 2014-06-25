<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ac\models\search\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'uclemmer | AC Users';
$this->params['breadcrumbs'][] = array('label' => 'AC', 'url' => '/ac');
$this->params['breadcrumbs'][] = array('label' => 'Users', 'url' => '/ac/users');
$this->params['breadcrumbs'][] = 'Settings';
?>

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
		
		<section id="site-content">
			<div class="container">
				<div class="row">
					<div class="col-md-5">

						<div class="ac-users-index">

							<h1>AC Users Settings</h1>
							
							<div class="table-responsive">
							  <table class="table">
								<thead>
									<tr>
										<th colspan="2"><h2>Profile</h2></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th>Username</th>
										<td><?php echo $user->username; ?></td>
									</tr>
									<tr>
										<th>Password</th>
										<td><a href="/ac/users/change-password">Change Password</a></td>
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
										<td>$<?php echo $user->credit; ?> <a href="#">Add</a></td>
									</tr>
								</tbody>
							  </table>
							</div>

						</div>

					</div>
				</div>
			</div>
		</section>