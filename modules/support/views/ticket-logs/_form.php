<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\support\models\TicketLog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-log-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ticket_id')->textInput() ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <?= $form->field($model, 'action')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
