<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\ContentHistory */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Content Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-history-view">

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
            'content_id',
            'type',
            'author',
            'name',
            'slug',
            'date_created',
            'content:ntext',
            'votes_up',
            'votes_down',
        ],
    ]) ?>

</div>
