<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\gow\models\Bank */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bank-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'alliance_id')->textInput() ?>

    <?= $form->field($model, 'stone')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'wood')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'food')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'ore')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'silver')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'date_updated')->textInput() ?>

    <?= $form->field($model, 'date_reconciled')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
