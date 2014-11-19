<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

use yii\helpers\Html;
use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?php echo '\Yii::$app->params[\'siteMeta\'][\'title\'] . \' - \' . '; ?><?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>

	  <section id="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">
        <div class="container">
          <div class="row">
		    <div class="col-xs-12">
				<h1><?= "<?= " ?>Html::encode(<?= $generator->generateString('{modelClass} Index', ['modelClass' => Inflector::camel2words(StringHelper::basename($generator->modelClass))]) ?>) ?></h1>
				<p>
					This is the view content for action "index".
					The action belongs to the controller "<?= get_class($this->context) ?>"
					in the "" module.
				</p>
				<p>
					You may customize this page by editing the following file:<br>
					<code><?= __FILE__ ?></code>
				</p>
			</div>
		  </div>
		</div>
	  </section>