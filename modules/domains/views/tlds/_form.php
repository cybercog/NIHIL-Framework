<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\domains\models\Tld */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tld-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 32]) ?>

    <?= $form->field($model, 'cost_register')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'cost_transfer')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'price_register')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'price_transfer')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
