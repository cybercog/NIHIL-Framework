<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ac\models\search\AuthKeysSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Auth Keys';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-keys-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Auth Keys', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'type',
            'key',
            'date_created',
            // 'date_expires',
            // 'date_used',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
