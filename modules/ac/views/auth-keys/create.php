<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\AuthKeys */

$this->title = 'Create Auth Keys';
$this->params['breadcrumbs'][] = ['label' => 'Auth Keys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-keys-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
