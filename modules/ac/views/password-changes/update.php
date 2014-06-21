<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\PasswordChanges */

$this->title = 'Update Password Changes: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Password Changes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="password-changes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
