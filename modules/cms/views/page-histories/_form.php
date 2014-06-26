<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\PageHistory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-history-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'page_id')->textInput() ?>

    <?= $form->field($model, 'author')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
