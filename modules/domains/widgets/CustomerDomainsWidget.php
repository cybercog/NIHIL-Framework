<?php
namespace app\modules\domains\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

use app\modules\ecom\models\Customer;
use app\modules\domains\models\RegisteredDomain;

class CustomerDomainsWidget extends Widget
{
    public $customer_id;

    public function init()
    {
        parent::init();
        if ($this->customer_id === NULL) {
			$customer = Customer::find()->where(['user_id' => \Yii::$app->user->getIdentity()->id])->one();
            if($customer) {
				$this->customer_id = $customer->id;
			}
        }
    }

    public function run()
    {
		//$domains = RegisteredDomain::find()->where(['customer_id' => $this->customer_id, 'active' => 1])->all();
		
		$dataProvider = new ActiveDataProvider([
			'query' => RegisteredDomain::find()->where(['customer_id' => $this->customer_id, 'active' => 1])->orderBy('date_expires'),
			'pagination' => [
				'pageSize' => 20,
			],
		]);
		
		return GridView::widget([
			'dataProvider' => $dataProvider,
			'columns' => [
						['class' => 'yii\grid\SerialColumn'],
						'name',
						'date_created',
						'date_registered',
						'date_expires',
						//['class' => 'yii\grid\ActionColumn'],
					],
		]);
		
    }
}