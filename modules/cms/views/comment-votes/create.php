<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\CommentVote */

$this->title = 'Create Comment Vote';
$this->params['breadcrumbs'][] = ['label' => 'Comment Votes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-vote-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
