<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\ContentHistory */

$this->title = 'Create Content History';
$this->params['breadcrumbs'][] = ['label' => 'Content Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
