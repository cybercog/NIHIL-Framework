<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\pda\models\search\EmailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="email-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'contact_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'token') ?>

    <?= $form->field($model, 'date_sent') ?>

    <?php // echo $form->field($model, 'date_first_opened') ?>

    <?php // echo $form->field($model, 'subject') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'date_last_view') ?>

    <?php // echo $form->field($model, 'views') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
