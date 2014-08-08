<?php

namespace app\modules\ecom\controllers;

use Yii;
use app\modules\ecom\models\InvoiceItem;
use app\modules\ecom\models\search\InvoiceItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * InvoiceItemsController implements the CRUD actions for InvoiceItem model.
 */
class InvoiceItemsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all InvoiceItem models.
     * @return mixed
     */
    public function actionIndex()
    {
		if (!\Yii::$app->user->can('ecomInvoiceItemsIndex')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $searchModel = new InvoiceItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InvoiceItem model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		if (!\Yii::$app->user->can('ecomInvoiceItemsView')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
	
	/**
     * Displays a single InvoiceItem model.
     * @param integer $id
     * @return mixed
     */
    public function actionDetails($id)
    {
		if (!\Yii::$app->user->can('ecomInvoiceItemsDetails')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new InvoiceItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if (!\Yii::$app->user->can('ecomInvoiceItemsCreate')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $model = new InvoiceItem();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing InvoiceItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		if (!\Yii::$app->user->can('ecomInvoiceItemsUpdate')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing InvoiceItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		if (!\Yii::$app->user->can('ecomInvoiceItemsDelete')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	/**
     * Lists all Invoice Items models.
     * @return mixed
     */
    public function actionList()
    {
		if (!\Yii::$app->user->can('ecomInvoiceItemsList')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $searchModel = new InvoiceItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the InvoiceItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InvoiceItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InvoiceItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
