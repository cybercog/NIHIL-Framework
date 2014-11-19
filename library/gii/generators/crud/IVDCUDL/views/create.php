<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?php echo '\Yii::$app->params[\'siteMeta\'][\'title\'] . \' - \' . '; ?><?= $generator->generateString('{modelClass} Create', ['modelClass' => Inflector::camel2words(StringHelper::basename($generator->modelClass))]) ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

	<section id="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-create">
        <div class="container">
          <div class="row">
		    <div class="col-sm-9">
				<h1><?= "<?= " ?>Html::encode(<?= $generator->generateString('{modelClass} Create', ['modelClass' => Inflector::camel2words(StringHelper::basename($generator->modelClass))]) ?>) ?></h1>
				<?= "<?= " ?>$this->render('_form', [
					'model' => $model,
				]) ?>
			</div>
			<div class="col-sm-3">
			
			</div>
		  </div>
		</div>
	  </section>
