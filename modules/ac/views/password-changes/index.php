<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ac\models\search\PasswordChangesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Password Changes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="password-changes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Password Changes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'hash',
            'date_created',
            'date_expires',
            // 'ip_address',
            // 'user_agent',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
