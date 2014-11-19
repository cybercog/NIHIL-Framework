<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\gow\models\BankDailyLog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bank-daily-log-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bank_id')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'daily_stone')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'daily_wood')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'daily_food')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'daily_ore')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'daily_silver')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'daily_total')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'sum_stone')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'sum_wood')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'sum_food')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'sum_ore')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'sum_silver')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'sum_total')->textInput(['maxlength' => 30]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
