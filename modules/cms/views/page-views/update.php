<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\PageView */

$this->title = 'Update Page View: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Page Views', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="page-view-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
