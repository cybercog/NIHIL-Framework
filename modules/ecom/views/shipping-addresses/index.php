<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ecom\models\search\ShippingAddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shipping Addresses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shipping-address-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Shipping Address', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'first',
            'last',
            'email:email',
            // 'phone',
            // 'address1',
            // 'address2',
            // 'city',
            // 'state',
            // 'zipcode',
            // 'country',
            // 'details:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
