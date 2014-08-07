<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\AuthnetTransaction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="authnet-transaction-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ip_address')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <?= $form->field($model, 'response_code')->textInput() ?>

    <?= $form->field($model, 'response_text')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'authorization_type')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'result')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'transaction_id')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'data_sent')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data_received')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'session_id')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'details')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
