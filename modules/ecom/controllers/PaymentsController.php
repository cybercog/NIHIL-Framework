<?php

namespace app\modules\ecom\controllers;

use Yii;
use app\modules\ecom\models\Payment;
use app\modules\ecom\models\Invoice;
use app\modules\ecom\models\Customer;
use app\modules\ecom\models\search\PaymentSearch;
use app\modules\ecom\models\forms\DonationForm;
use app\modules\ecom\models\forms\ConfirmForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * PaymentsController implements the CRUD actions for Payment model.
 */
class PaymentsController extends Controller
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
     * Lists all Payment models.
     * @return mixed
     */
    public function actionIndex()
    {
		if (!\Yii::$app->user->can('ecomPaymentsIndex')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        return $this->render('index');
    }
	
	/**
     * Donate.
     * @return mixed
     */
    public function actionDonate($amount = NULL)
    {
		if (!\Yii::$app->user->can('ecomPaymentsDonate')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $model = new DonationForm;
		
		if($amount) {
			$model->amount = $amount;
		}

        //if ($model->load(Yii::$app->request->post()) && $token = $model->invoice()) {
		if ($model->load(Yii::$app->request->post()) && $token = $model->fdAuthorizeDonation()) {
			if(\Yii::$app->cart->confirmOrderCart($token)) {
				return $this->redirect(['donation-confirm']);
			}
        } else {
            return $this->render('donate', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionDonationConfirm()
    {
		if (!\Yii::$app->user->can('ecomPaymentsDonationConfirm')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
		if(!$token = \Yii::$app->cart->getConfirmToken()) {
			return $this->redirect(['donate']);
		}
		
		$model = new ConfirmForm;
	
		//if (Yii::$app->request->post()) {
		if ($model->load(Yii::$app->request->post()) && $model->captureFDDonation()) {
			
			//return $this->render('success');
			return $this->redirect(['donation-success']);
			
        } else {
			
			$invoice = Invoice::find()->where(['token' => $token])->one();
			
			if($invoice->invoice_status_id != 4) {
				$model = NULL;
			}
			
			//$invoice_items = $invoice->invoiceItems;
			$payment = Payment::find()->where(['id' => $invoice->payment_id])->one();
			$customer = Customer::find()->where(['id' => $invoice->customer_id])->one();

            return $this->render('donation-confirm', [
				'token' => $token,
				'invoice' => $invoice,
				'payment' => $payment,
				'customer' => $customer,
				'model' => $model,
			]);
        }
    }
	
	public function actionDonationSuccess()
    {
		if (!\Yii::$app->user->can('ecomPaymentsDonationSuccess')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
		if(!$token = \Yii::$app->cart->getConfirmToken()) {
			return $this->redirect(['donate']);
		}
		
		\Yii::$app->cart->clear();
		
        return $this->render('donation-success');
    }

    /**
     * Displays a single Payment model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		if (!\Yii::$app->user->can('ecomPaymentsView')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
	
	/**
     * Displays a single Payment model.
     * @param integer $id
     * @return mixed
     */
    public function actionDetails($id)
    {
		if (!\Yii::$app->user->can('ecomPaymentsDetails')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Payment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if (!\Yii::$app->user->can('ecomPaymentsCreate')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $model = new Payment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Payment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		if (!\Yii::$app->user->can('ecomPaymentsUpdate')) {
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
     * Deletes an existing Payment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		if (!\Yii::$app->user->can('ecomPaymentsDelete')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	/**
     * Lists all Payments models.
     * @return mixed
     */
    public function actionList()
    {
		if (!\Yii::$app->user->can('ecomPaymentsList')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $searchModel = new PaymentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the Payment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Payment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Payment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
