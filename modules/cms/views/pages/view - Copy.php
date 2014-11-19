<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\cms\models\Page */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - View: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="page-view">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= Html::encode($model->name) ?></h1>
				<?php echo $model->content; ?>
			</div>
		  </div>
		</div>
	  </section>