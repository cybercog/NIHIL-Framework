<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'first')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'last')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => 150]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 150]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => 16]) ?>

    <?= $form->field($model, 'address1')->textInput(['maxlength' => 150]) ?>

    <?= $form->field($model, 'address2')->textInput(['maxlength' => 150]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => 150]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => 2]) ?>

    <?= $form->field($model, 'zipcode')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => 2]) ?>

    <?= $form->field($model, 'details')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
