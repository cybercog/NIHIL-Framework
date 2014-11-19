<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\core\models\DirectoryListing */

$this->title = \Yii::$app->params['siteMeta']['title'] . ' - ' . 'Directory Listing Create';
$this->params['breadcrumbs'][] = ['label' => 'Directory Listings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<section id="directory-listing-create">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= Html::encode('Directory Listing Create') ?></h1>
				<?= $this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-3">
			
			</div>
		  </div>
		</div>
	  </section>
