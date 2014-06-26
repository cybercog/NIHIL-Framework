<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\PageView */

$this->title = 'Create Page View';
$this->params['breadcrumbs'][] = ['label' => 'Page Views', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-view-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
