<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\Invoice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invoice-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'invoice_number')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'invoice_status_id')->textInput() ?>

    <?= $form->field($model, 'billing_id')->textInput() ?>

    <?= $form->field($model, 'shipping_id')->textInput() ?>

    <?= $form->field($model, 'payment_id')->textInput() ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'date_updated')->textInput() ?>

    <?= $form->field($model, 'date_due')->textInput() ?>

    <?= $form->field($model, 'date_paid')->textInput() ?>

    <?= $form->field($model, 'subtotal')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'shipping')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'credit')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'tax')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'tax_rate')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'total')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'token')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'details')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
