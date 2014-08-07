<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\Payment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'payment_type_id')->textInput() ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'payment_method_id')->textInput() ?>

    <?= $form->field($model, 'account_type')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'account_number')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'transaction_id')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'token')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'details')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
