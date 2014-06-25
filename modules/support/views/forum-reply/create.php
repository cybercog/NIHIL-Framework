<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\support\models\ForumReply */

$this->title = 'Create Forum Reply';
$this->params['breadcrumbs'][] = ['label' => 'Forum Replies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forum-reply-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
