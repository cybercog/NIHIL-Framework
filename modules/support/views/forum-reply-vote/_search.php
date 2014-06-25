<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\support\models\search\ForumReplyVoteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="forum-reply-vote-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'reply_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'timestamp') ?>

    <?= $form->field($model, 'vote') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
