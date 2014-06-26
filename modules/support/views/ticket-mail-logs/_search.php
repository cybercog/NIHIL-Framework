<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\support\models\search\TicketMailLogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-mail-log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'recipient_email') ?>

    <?= $form->field($model, 'sender_name') ?>

    <?= $form->field($model, 'sender_email') ?>

    <?= $form->field($model, 'timestamp') ?>

    <?php // echo $form->field($model, 'subject') ?>

    <?php // echo $form->field($model, 'message') ?>

    <?php // echo $form->field($model, 'action') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
