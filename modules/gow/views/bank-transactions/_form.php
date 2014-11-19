<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\gow\models\BankTransaction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bank-transaction-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reconciled')->textInput() ?>

    <?= $form->field($model, 'bank_id')->textInput() ?>

    <?= $form->field($model, 'player_id')->textInput() ?>

    <?= $form->field($model, 'stone')->textInput(['maxlength' => 21]) ?>

    <?= $form->field($model, 'wood')->textInput(['maxlength' => 21]) ?>

    <?= $form->field($model, 'food')->textInput(['maxlength' => 21]) ?>

    <?= $form->field($model, 'ore')->textInput(['maxlength' => 21]) ?>

    <?= $form->field($model, 'silver')->textInput(['maxlength' => 21]) ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
