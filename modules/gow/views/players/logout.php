<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ac\models\search\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Logout';
//$this->params['breadcrumbs'][] = array('label' => 'AC', 'url' => '/ac');
//$this->params['breadcrumbs'][] = array('label' => 'Users', 'url' => '/ac/users');
$this->params['breadcrumbs'][] = 'Logout';
?>
		
		<section id="ac-users-logout">
			<div class="container">
				<div class="row">
					<div class="col-md-12">

						<div class="ac-users-logout">

							<h1>Logout</h1>
							<p>You have successfully been logged out.  Click <a href="/login">here</a> to log back in.</p>

						</div>

					</div>
				</div>
			</div>
		</section>