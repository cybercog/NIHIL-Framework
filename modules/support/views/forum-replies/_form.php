<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\support\models\ForumReply */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="forum-reply-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent')->textInput() ?>

    <?= $form->field($model, 'post_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'votes_up')->textInput() ?>

    <?= $form->field($model, 'votes_down')->textInput() ?>

    <?= $form->field($model, 'accepted')->textInput() ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_created')->textInput() ?>

    <?= $form->field($model, 'date_modified')->textInput() ?>

    <?= $form->field($model, 'date_edited')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
