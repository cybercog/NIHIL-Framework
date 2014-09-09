<?php

namespace app\modules\ecom\controllers;

use Yii;
use app\modules\ecom\models\Invoice;
use app\modules\ecom\models\ShippingAddress;
use app\modules\ecom\models\Payment;
use app\modules\ecom\models\Customer;
use app\modules\ecom\models\search\InvoiceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * InvoicesController implements the CRUD actions for Invoice model.
 */
class InvoicesController extends Controller
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
     * Lists all Invoice models.
     * @return mixed
     */
    public function actionIndex()
    {
		if (!\Yii::$app->user->can('ecomInvoicesIndex')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        return $this->render('index');
    }

    /**
     * Displays a single Invoice model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($token)
    {
		if(!$invoice = Invoice::find()->where(['token' => $token])->one()){
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	
		if (!\Yii::$app->user->can('ecomInvoicesView', ['invoice' => $invoice])) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        return $this->render('view', [
            'invoice' => $invoice,
			'customer' => Customer::find()->where(['id' => $invoice->customer_id])->one(),
			'shipping_address' => ShippingAddress::find()->where(['id' => $invoice->shipping_id])->one(),
			'payment' => Payment::find()->where(['id' => $invoice->payment_id])->one(),
        ]);
    }
	
	/**
     * Displays a single Invoice model.
     * @param integer $id
     * @return mixed
     */
    public function actionPrint($token)
    {
		if(!$invoice = Invoice::find()->where(['token' => $token])->one()){
			throw new NotFoundHttpException('The requested page does not exist.');
		}
		
		if (!\Yii::$app->user->can('ecomInvoicesPrint', ['invoice' => $invoice])) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        return $this->render('print', [
            'invoice' => $invoice,
        ]);
    }
	
	/**
     * Displays a single Invoice model.
     * @param integer $id
     * @return mixed
     */
    public function actionDetails($id)
    {
		if (!\Yii::$app->user->can('ecomInvoicesDetails')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Invoice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if (!\Yii::$app->user->can('ecomInvoicesCreate')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $model = new Invoice();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Invoice model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		if (!\Yii::$app->user->can('ecomInvoicesUpdate')) {
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
     * Deletes an existing Invoice model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		if (!\Yii::$app->user->can('ecomInvoicesDelete')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	/**
     * Lists all Invoices models.
     * @return mixed
     */
    public function actionList()
    {
		if (!\Yii::$app->user->can('ecomInvoicesList')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $searchModel = new InvoiceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the Invoice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Invoice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Invoice::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
