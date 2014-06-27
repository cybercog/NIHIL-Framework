<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\cms\models\search\ProjectStepSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Steps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-step-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Project Step', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'project_id',
            'type',
            'image',
            'time_estimated',
            // 'content:ntext',
            // 'order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
