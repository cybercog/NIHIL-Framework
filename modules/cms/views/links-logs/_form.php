<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\LinksLog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="links-log-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'link_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <?= $form->field($model, 'user_ip')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'user_agent')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
