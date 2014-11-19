<?php
namespace app\modules\ecom\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

use app\modules\ecom\models\Invoice;

class UserInvoicesWidget extends Widget
{
    private $user_id;

    public function init()
    {
        parent::init();
        if ($this->user_id === NULL) {
			$this->user_id = \Yii::$app->user->getIdentity()->id;
        }
    }

    public function run()
    {
		//$domains = RegisteredDomain::find()->where(['customer_id' => $this->customer_id, 'active' => 1])->all();
		
		$statusLabels = array(
			'1' => '<span class="label label-success">New</span>',
			'2' => '<span class="label label-warning">Overdue</span>',
			'3' => '<span class="label label-danger">Paid</span>',
			'4' => '<span class="label label-info">Authorized</span>',
			'5' => '<span class="label label-info">Pledged</span>',
			'6' => '<span class="label label-default">Expired</span>',
			'7' => '<span class="label label-primary">Needs Revision</span>',
		);
		
		$dataProvider = new ActiveDataProvider([
			'query' => Invoice::find()->where(['user_id' => $this->user_id])->orderBy('date_due'),
			'pagination' => [
				'pageSize' => 10,
			],
		]);
		
		$ret = '<div class="row">
		    <div class="col-xs-12">
				<div class="row">
				  <div class="col-sm-4">
				    <div class="row bargraph-info-wrapper">
					  <div class="col-xs-12 bargraph bargraph-info">
					    &nbsp;
					  </div>
					</div>
					<h3>$0.00</h3>
				    <h4>Estimates</h4>
				  </div>
				  <div class="col-sm-4">
				    <div class="row">
					  <div class="col-sm-6">
						<div class="row">
						  <div class="col-xs-12 bargraph bargraph-warning">
							&nbsp;
						  </div>
						</div>
						<h3>$0.00</h3>
					    <h4>Open</h4>
					  </div>
					  <div class="col-sm-5">
					    <div class="row">
						  <div class="col-xs-12 bargraph bargraph-danger">
							&nbsp;
						  </div>
						</div>
						<h3>$0.00</h3>
					    <h4>Overdue</h4>
					  </div>
					  <div class="col-sm-1">
					    <div class="row">
						  <div class="col-xs-12 bargraph bargraph-warning">
							&nbsp;
						  </div>
						</div>
					    &nbsp;
					  </div>
					</div>
				  </div>
				  <div class="col-sm-4">
				    <div class="row bargraph-success-wrapper">
					  <div class="col-xs-12 bargraph bargraph-success">
					    &nbsp;
					  </div>
					</div>
					<h3>$0.00</h3>
				    <h4>Year to Date</h4>
				  </div>
				</div>
			</div>
		  </div>';
		
		return $ret . GridView::widget([
			'dataProvider' => $dataProvider,
			'columns' => [
						['class' => 'yii\grid\SerialColumn'],
						[
							'attribute' => 'Invoice',
							'format' => 'raw',
							'value' => function ($model) use ($statusLabels) {  							
								return $model->invoice_number . ' ' . $statusLabels[$model->invoice_status_id];
							},
						],
						'date_due',
						'total',
						[
							'attribute' => 'Actions',
							'format' => 'raw',
							'value' => function ($model) {  
								$ret = '<div class="btn-group btn-group-sm">';
								$ret .= '<a href="/ecom/invoices/view/' . $model->token . '" class="btn btn-default"><i class="fa fa-file-text-o"></i> View</a>';
								if(!$model->payment_id) { 
									$ret .= '<a href="/ecom/invoices/pay/' . $model->token . '" class="btn btn-default"><i class="fa fa-credit-card"></i> Pay</a>';
								}
								$ret .= '<button type="button" class="btn btn-default" onclick="window.open(&quot;/ecom/invoices/print/' . $model->token . '&quot;, &quot;_blank&quot;, &quot;toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=705,height=877&quot;)"><i class="fa fa-print"></i> Print</a>';
								$ret .= '</div>';							
								
								return $ret;
							},
						],
					],
		]);
		
    }
}