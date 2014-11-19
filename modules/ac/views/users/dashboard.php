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
          <div class="row">
		    <div class="col-xs-12">
				<div class="row">
				  <div class="col-sm-12">
				    <h1 class="page-header">Dashboard</h1>
				  </div>
				</div>
			</div>
		  </div>
	  </section>