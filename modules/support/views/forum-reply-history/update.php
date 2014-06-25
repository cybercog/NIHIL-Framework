<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\support\models\ForumReplyHistory */

$this->title = 'Update Forum Reply History: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Forum Reply Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="forum-reply-history-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
