<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\support\models\search\ForumPostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Forum Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forum-post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Forum Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'thread_id',
            'title',
            'slug',
            // 'content:ntext',
            // 'views_count',
            // 'replies_count',
            // 'votes_up',
            // 'votes_down',
            // 'sticky',
            // 'date_created',
            // 'date_modified',
            // 'date_edited',
            // 'locked',
            // 'deleted',
            // 'accepted_answer',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
