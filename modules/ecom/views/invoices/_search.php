<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\search\InvoiceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invoice-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'invoice_number') ?>

    <?= $form->field($model, 'invoice_status_id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'shipping_id') ?>

    <?php // echo $form->field($model, 'payment_id') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'date_due') ?>

    <?php // echo $form->field($model, 'date_paid') ?>

    <?php // echo $form->field($model, 'subtotal') ?>

    <?php // echo $form->field($model, 'shipping') ?>

    <?php // echo $form->field($model, 'credit') ?>

    <?php // echo $form->field($model, 'tax') ?>

    <?php // echo $form->field($model, 'tax_rate') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'token') ?>

    <?php // echo $form->field($model, 'details') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
