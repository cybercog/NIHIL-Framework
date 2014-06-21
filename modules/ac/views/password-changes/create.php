<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\PasswordChanges */

$this->title = 'Create Password Changes';
$this->params['breadcrumbs'][] = ['label' => 'Password Changes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="password-changes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
