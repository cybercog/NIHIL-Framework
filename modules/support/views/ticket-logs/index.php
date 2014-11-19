<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\support\models\search\TicketLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Ticket Logs';
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="ticket-log-index">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode('Ticket Log Index') ?></h1>
				<p>
					This is the view content for action "index".
					The action belongs to the controller "yii\gii\generators\crud\Generator"
					in the "" module.
				</p>
				<p>
					You may customize this page by editing the following file:<br>
					<code>C:\xampp\server\nihil.co\www\library\gii\generators\crud\IVDCUDL\views\index.php</code>
				</p>
			</div>
		  </div>
		</div>
	  </section>