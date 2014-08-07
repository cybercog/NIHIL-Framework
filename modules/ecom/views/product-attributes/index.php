<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\ecom\models\search\ProductAttributeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Attributes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-attribute-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product Attribute', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_id',
            'attribute_id',
            'stock',
            'date_inventoried',
            // 'user_inventoried',
            // 'date_last_sale',
            // 'sold',
            // 'details:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
