<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\grid\GridView;

/* @var $this yii\web\View */

$this->title = 'uclemmer | Ecom Catalogues List';
$this->params['breadcrumbs'][] = ['label' => 'Ecom', 'url' => '/ecom'];
$this->params['breadcrumbs'][] = ['label' => 'Catalogues', 'url' => '/ecom/catalogues'];
$this->params['breadcrumbs'][] = 'List';
?>

		<section id="site-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
		
						<?= Breadcrumbs::widget([
							'homeLink' => [
								'label' => 'Home',
								'template' => "<li><a href='\'><i class='fa fa-home'></i></a></li>\n",
							],
							'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
						]) ?>
			
					</div>
				</div>
			</div>
		</section>
		
		<section id="site-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">

						<div class="ecom-catalogues-list">
							<h1>Ecom Catalogues List</h1>
							<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

							<p>
								<?= Html::a('Create Catalogue', ['create'], ['class' => 'btn btn-success']) ?>
							</p>

							<?= GridView::widget([
								'dataProvider' => $dataProvider,
								'filterModel' => $searchModel,
								'columns' => [
									['class' => 'yii\grid\SerialColumn'],

									'id',
									'parent',
									'name',
									'description:ntext',

									['class' => 'yii\grid\ActionColumn'],
								],
							]); ?>
						</div>

					</div>
				</div>
			</div>
		</section>
		
		<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\ecom\models\search\CatalogueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catalogues';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalogue-index">

    

</div>
