<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\support\models\search\TicketMailLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ticket Mail Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-mail-log-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ticket Mail Log', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'recipient_email:ntext',
            'sender_name:ntext',
            'sender_email:ntext',
            'timestamp',
            // 'subject:ntext',
            // 'message:ntext',
            // 'action:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
