<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\InvoiceItem */

$this->title = 'Update Invoice Item: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Invoice Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="invoice-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
