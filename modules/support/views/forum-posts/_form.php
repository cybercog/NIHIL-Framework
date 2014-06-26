<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\support\models\ForumPost */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="forum-post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'thread_id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'views_count')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'replies_count')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'votes_up')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'votes_down')->textInput(['maxlength' => 11]) ?>

    <?= $form->field($model, 'sticky')->textInput() ?>

    <?= $form->field($model, 'locked')->textInput() ?>

    <?= $form->field($model, 'deleted')->textInput() ?>

    <?= $form->field($model, 'accepted_answer')->textInput() ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'date_modified')->textInput() ?>

    <?= $form->field($model, 'date_edited')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
