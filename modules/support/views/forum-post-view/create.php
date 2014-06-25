<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\support\models\ForumPostView */

$this->title = 'Create Forum Post View';
$this->params['breadcrumbs'][] = ['label' => 'Forum Post Views', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forum-post-view-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
