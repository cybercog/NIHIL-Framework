<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\PageHistory */

$this->title = 'Create Page History';
$this->params['breadcrumbs'][] = ['label' => 'Page Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
