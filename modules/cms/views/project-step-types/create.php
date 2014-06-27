<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\ProjectStepType */

$this->title = 'Create Project Step Type';
$this->params['breadcrumbs'][] = ['label' => 'Project Step Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-step-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
