<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\gow\models\search\BankDailyLogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bank-daily-log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'bank_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'daily_stone') ?>

    <?= $form->field($model, 'daily_wood') ?>

    <?php // echo $form->field($model, 'daily_food') ?>

    <?php // echo $form->field($model, 'daily_ore') ?>

    <?php // echo $form->field($model, 'daily_silver') ?>

    <?php // echo $form->field($model, 'daily_total') ?>

    <?php // echo $form->field($model, 'sum_stone') ?>

    <?php // echo $form->field($model, 'sum_wood') ?>

    <?php // echo $form->field($model, 'sum_food') ?>

    <?php // echo $form->field($model, 'sum_ore') ?>

    <?php // echo $form->field($model, 'sum_silver') ?>

    <?php // echo $form->field($model, 'sum_total') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
