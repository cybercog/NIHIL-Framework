<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\AuthnetTransaction */

$this->title = 'Update Authnet Transaction: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Authnet Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="authnet-transaction-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
