<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\pda\models\Email */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="email-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'contact_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'token')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'date_sent')->textInput() ?>

    <?= $form->field($model, 'date_first_opened')->textInput() ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_last_view')->textInput() ?>

    <?= $form->field($model, 'views')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
