<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\search\ProductAttributeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-attribute-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'attribute_id') ?>

    <?= $form->field($model, 'stock') ?>

    <?= $form->field($model, 'date_inventoried') ?>

    <?php // echo $form->field($model, 'user_inventoried') ?>

    <?php // echo $form->field($model, 'date_last_sale') ?>

    <?php // echo $form->field($model, 'sold') ?>

    <?php // echo $form->field($model, 'details') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
