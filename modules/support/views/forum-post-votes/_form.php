<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\support\models\ForumPostVote */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="forum-post-vote-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'post_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <?= $form->field($model, 'vote')->textInput(['maxlength' => 128]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
