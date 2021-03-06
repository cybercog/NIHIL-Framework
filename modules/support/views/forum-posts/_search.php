<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\support\models\search\ForumPostSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="forum-post-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'thread_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'slug') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'views_count') ?>

    <?php // echo $form->field($model, 'replies_count') ?>

    <?php // echo $form->field($model, 'votes_up') ?>

    <?php // echo $form->field($model, 'votes_down') ?>

    <?php // echo $form->field($model, 'sticky') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <?php // echo $form->field($model, 'date_modified') ?>

    <?php // echo $form->field($model, 'date_edited') ?>

    <?php // echo $form->field($model, 'locked') ?>

    <?php // echo $form->field($model, 'deleted') ?>

    <?php // echo $form->field($model, 'accepted_answer') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
