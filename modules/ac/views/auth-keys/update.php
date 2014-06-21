<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\AuthKeys */

$this->title = 'Update Auth Keys: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Auth Keys', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="auth-keys-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
