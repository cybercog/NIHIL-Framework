<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\cms\models\search\PageViewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Page Views';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-view-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Page View', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'page_id',
            'user_id',
            'timestamp',
            'ip_address',
            // 'user_agent',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
