<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\ac\models\EmailChanges */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Email Changes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-changes-view">

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
            'email:email',
            'date_created',
            'ip_address',
            'user_agent',
        ],
    ]) ?>

</div>
