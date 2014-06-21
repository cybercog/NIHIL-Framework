<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\PasswordChanges */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Password Changes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="password-changes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'hash',
            'date_created',
            'date_expires',
            'ip_address',
            'user_agent',
        ],
    ]) ?>

</div>
