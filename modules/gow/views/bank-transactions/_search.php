<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\gow\models\search\BankTransactionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bank-transaction-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'reconciled') ?>

    <?= $form->field($model, 'bank_id') ?>

    <?= $form->field($model, 'player_id') ?>

    <?= $form->field($model, 'stone') ?>

    <?php // echo $form->field($model, 'wood') ?>

    <?php // echo $form->field($model, 'food') ?>

    <?php // echo $form->field($model, 'ore') ?>

    <?php // echo $form->field($model, 'silver') ?>

    <?php // echo $form->field($model, 'timestamp') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
