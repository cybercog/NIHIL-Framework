<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ecom\models\search\AuthnetTransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Authnet Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authnet-transaction-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Authnet Transaction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ip_address',
            'timestamp',
            'response_code',
            'response_text',
            // 'authorization_type:ntext',
            // 'result',
            // 'transaction_id',
            // 'data_sent:ntext',
            // 'data_received:ntext',
            // 'session_id',
            // 'details:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
