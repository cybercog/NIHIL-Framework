<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\support\models\ForumThread */

$this->title = 'Update Forum Thread: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Forum Threads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="forum-thread-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
