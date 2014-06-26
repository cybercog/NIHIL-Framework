<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\cms\models\search\ContentHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Content Histories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-history-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Content History', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'content_id',
            'type',
            'author',
            'name',
            // 'slug',
            // 'date_created',
            // 'content:ntext',
            // 'votes_up',
            // 'votes_down',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
