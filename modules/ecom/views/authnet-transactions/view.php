<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\AuthnetTransaction */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Authnet Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authnet-transaction-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ip_address',
            'timestamp',
            'response_code',
            'response_text',
            'authorization_type:ntext',
            'result',
            'transaction_id',
            'data_sent:ntext',
            'data_received:ntext',
            'session_id',
            'details:ntext',
        ],
    ]) ?>

</div>
