<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ac\models\search\EmailChangesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Email Changes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-changes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Email Changes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'email:email',
            'date_created',
            'ip_address',
            // 'user_agent',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
