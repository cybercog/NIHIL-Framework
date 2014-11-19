<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\modules\domains\widgets\CustomerDomainsWidget;
use app\modules\ecom\widgets\UserInvoicesWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ac\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="ac-user-index">
        <div class="container">
		
          <div class="row">
		    <div class="col-xs-12">
				<div class="row">
				  <div class="col-sm-12">
				    <h1 class="page-header-stacked"><?php echo \Yii::$app->user->getIdentity()->first_name . ' ' . \Yii::$app->user->getIdentity()->last_name; ?></h1>
					<h4 class="page-header-stacked page-header"><?php echo date("F j, Y"); ?></h4>
				  </div>
				</div>
				<div class="row">
				  <div class="col-sm-12">
				    <h2>Invoices</h2>
				  </div>
				</div>
				<div class="row">
				  <div class="col-sm-12">
				    <?= UserInvoicesWidget::widget(); ?>
				  </div>
				</div>
			</div>
		  </div>
		  
		</div>
	  </section>