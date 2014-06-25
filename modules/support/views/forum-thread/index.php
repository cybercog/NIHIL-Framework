<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\support\models\search\ForumThreadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Forum Threads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forum-thread-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Forum Thread', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'parent',
            'name',
            'slug',
            'posts_count',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
