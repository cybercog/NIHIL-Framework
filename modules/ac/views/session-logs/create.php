<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\SessionLogs */

$this->title = 'Create Session Logs';
$this->params['breadcrumbs'][] = ['label' => 'Session Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="session-logs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
