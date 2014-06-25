<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\support\models\search\ForumPostVoteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Forum Post Votes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forum-post-vote-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Forum Post Vote', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'post_id',
            'user_id',
            'timestamp',
            'vote',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
