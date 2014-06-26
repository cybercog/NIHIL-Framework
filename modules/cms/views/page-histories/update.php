<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\PageHistory */

$this->title = 'Update Page History: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Page Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="page-history-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
