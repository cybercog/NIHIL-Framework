<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\support\models\ForumPost */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Forum Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forum-post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'thread_id',
            'title',
            'slug',
            'content:ntext',
            'views_count',
            'replies_count',
            'votes_up',
            'votes_down',
            'sticky',
            'date_created',
            'date_modified',
            'date_edited',
            'locked',
            'deleted',
            'accepted_answer',
        ],
    ]) ?>

</div>
