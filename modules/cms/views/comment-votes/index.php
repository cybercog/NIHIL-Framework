<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\cms\models\search\CommentVoteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comment Votes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-vote-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Comment Vote', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'comment_id',
            'user_id',
            'timestamp',
            'vote',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
