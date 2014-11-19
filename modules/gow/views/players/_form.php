<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\gow\models\Player */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="player-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'alliance_id')->textInput() ?>

    <?= $form->field($model, 'rank')->textInput(['maxlength' => 3]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'stone')->textInput(['maxlength' => 24]) ?>

    <?= $form->field($model, 'wood')->textInput(['maxlength' => 24]) ?>

    <?= $form->field($model, 'food')->textInput(['maxlength' => 24]) ?>

    <?= $form->field($model, 'ore')->textInput(['maxlength' => 24]) ?>

    <?= $form->field($model, 'silver')->textInput(['maxlength' => 24]) ?>

    <?= $form->field($model, 'date_joined')->textInput() ?>

    <?= $form->field($model, 'date_updated')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
