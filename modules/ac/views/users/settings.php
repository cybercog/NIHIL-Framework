<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

use app\modules\ac\widgets\AccountInformationWidget;
use app\modules\ac\widgets\ContactInformationWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ac\models\search\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::$app->params['siteMeta']['title'] . ' | Settings';
//$this->params['breadcrumbs'][] = array('label' => 'AC', 'url' => '/ac');
//$this->params['breadcrumbs'][] = array('label' => 'Users', 'url' => '/ac/users');
$this->params['breadcrumbs'][] = 'Settings';
?>
		
		<section id="ac-users-settings">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h1>Settings</h1>
					</div>
				</div>
			
				<div class="row">
					<div class="col-md-6">
							
						<?= AccountInformationWidget::widget(); ?>

					</div>
					<div class="col-md-6">
							
						<?= ContactInformationWidget::widget(); ?>

					</div>
				</div>
			</div>
		</section>