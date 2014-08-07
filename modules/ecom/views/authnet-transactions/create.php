<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\ecom\models\AuthnetTransaction */

$this->title = 'Create Authnet Transaction';
$this->params['breadcrumbs'][] = ['label' => 'Authnet Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authnet-transaction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
