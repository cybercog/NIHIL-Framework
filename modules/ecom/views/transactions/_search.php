<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\search\AuthnetTransactionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="authnet-transaction-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ip_address') ?>

    <?= $form->field($model, 'timestamp') ?>

    <?= $form->field($model, 'response_code') ?>

    <?= $form->field($model, 'response_text') ?>

    <?php // echo $form->field($model, 'authorization_type') ?>

    <?php // echo $form->field($model, 'result') ?>

    <?php // echo $form->field($model, 'transaction_id') ?>

    <?php // echo $form->field($model, 'data_sent') ?>

    <?php // echo $form->field($model, 'data_received') ?>

    <?php // echo $form->field($model, 'session_id') ?>

    <?php // echo $form->field($model, 'details') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
