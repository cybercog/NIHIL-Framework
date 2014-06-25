<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\support\models\search\ForumReplySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Forum Replies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forum-reply-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Forum Reply', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'parent',
            'post_id',
            'user_id',
            'content:ntext',
            // 'date_created',
            // 'date_modified',
            // 'date_edited',
            // 'votes_up',
            // 'votes_down',
            // 'accepted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
