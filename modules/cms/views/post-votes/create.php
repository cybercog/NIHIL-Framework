<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\ContentVote */

$this->title = 'Create Content Vote';
$this->params['breadcrumbs'][] = ['label' => 'Content Votes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-vote-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
