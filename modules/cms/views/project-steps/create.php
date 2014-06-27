<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\ProjectStep */

$this->title = 'Create Project Step';
$this->params['breadcrumbs'][] = ['label' => 'Project Steps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-step-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
