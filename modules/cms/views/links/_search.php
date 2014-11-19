<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\search\LinkSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="link-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'short_code') ?>

    <?= $form->field($model, 'label') ?>

    <?= $form->field($model, 'url') ?>

    <?= $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'date_expires') ?>

    <?php // echo $form->field($model, 'clicks_expires') ?>

    <?php // echo $form->field($model, 'clicks_total') ?>

    <?php // echo $form->field($model, 'date_last_click') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
