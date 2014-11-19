<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\gow\models\search\PlayerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="player-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'alliance_id') ?>

    <?= $form->field($model, 'rank') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'stone') ?>

    <?php // echo $form->field($model, 'wood') ?>

    <?php // echo $form->field($model, 'food') ?>

    <?php // echo $form->field($model, 'ore') ?>

    <?php // echo $form->field($model, 'silver') ?>

    <?php // echo $form->field($model, 'date_joined') ?>

    <?php // echo $form->field($model, 'date_updated') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
