<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\support\models\ForumPostHistory */

$this->title = 'Create Forum Post History';
$this->params['breadcrumbs'][] = ['label' => 'Forum Post Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forum-post-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
