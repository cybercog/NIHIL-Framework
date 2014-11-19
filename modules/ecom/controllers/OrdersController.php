<?php

namespace app\modules\ecom\controllers;

use Yii;
use app\modules\ecom\models\Order;
use app\modules\ecom\models\Invoice;
use app\modules\ecom\models\Payment;
use app\modules\ecom\models\Customer;
use app\modules\ecom\models\ShippingAddress;
use app\modules\ecom\models\search\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

use app\modules\ecom\models\forms\OrderConfirmForm;
use app\modules\ecom\models\forms\OrderPaymentForm;
use app\modules\ecom\models\forms\ShippingAddressForm;
use app\modules\ecom\models\forms\ShippingMethodForm;


/**
 * OrdersController implements the CRUD actions for Order model.
 */
class OrdersController extends Controller
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
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
		if (!\Yii::$app->user->can('ecomOrdersIndex')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        return $this->render('index');
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		if (!\Yii::$app->user->can('ecomOrdersView')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
	
	/**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     */
    public function actionDetails($id)
    {
		if (!\Yii::$app->user->can('ecomOrdersDetails')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if (!\Yii::$app->user->can('ecomOrdersCreate')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $model = new Order();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		if (!\Yii::$app->user->can('ecomOrdersUpdate')) {
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
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		if (!\Yii::$app->user->can('ecomOrdersDelete')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	/**
     * Lists all Orders models.
     * @return mixed
     */
    public function actionList()
    {
		if (!\Yii::$app->user->can('ecomOrdersList')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	/**
     * Checkout.
     * @return mixed
     */
    public function actionCheckout($step = NULL)
    {
		if (!\Yii::$app->user->can('ecomOrdersCheckout')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
		if(!($step == 'shipping' OR $step == 'method' OR $step == 'payment' OR $step == 'confirm' OR $step == 'success')) {
			throw new NotFoundHttpException('That part of the checkout process was not found.');
		}
		
		if($step == 'method') {
			
			$model = new ShippingMethodForm;
			$rate = $model->calcUSPSShipping();
			
			if ($model->load(Yii::$app->request->post()) && $model->saveShippingMethod($rate)) {
				return $this->redirect(['/checkout/payment']);
			} else {
				return $this->render('method', [
					'model' => $model,
					'rate' => $rate,
				]);
			}
			
		}elseif($step == 'payment') {
			
			$model = new OrderPaymentForm;
			
			$sid = \Yii::$app->cart->getShippingAddress();
			
			if($sa = ShippingAddress::find()->where(['id' => $sid])->one()) {
				$a = array(
					'OrderPaymentForm' => array(
						'first_name' => $sa->first,
						'last_name' => $sa->last,
						'email' => $sa->email,
						'phone' => $sa->phone,
						'address1' => $sa->address1,
						'address2' => $sa->address2,
						'city' => $sa->city,
						'state' => $sa->state,
						'postal_code' => $sa->zipcode,
					)
				);
				$model->load($a);
			}

			if ($model->load(Yii::$app->request->post()) && $token = $model->fdAuthorizeTransaction()) {
				if(\Yii::$app->cart->confirmOrderCart($token)) {
					return $this->redirect(['/checkout/confirm']);
				}
			} else {
				return $this->render('payment', [
					'model' => $model,
				]);
			}
			
		}elseif($step == 'confirm'){
		
			//\Yii::$app->cart->clear();
		
			if(!$token = \Yii::$app->cart->getConfirmToken()) {
				return $this->redirect(['/checkout']);
			}
		
			$model = new OrderConfirmForm;
			
			if ($model->load(Yii::$app->request->post()) && $model->confirmOrder()) {
				return $this->redirect(['/checkout/success']);
			} else {
				
				$invoice = Invoice::find()->where(['token' => $token])->one();
				
				if($invoice->invoice_status_id != 4) {
					$model = NULL;
				}
				
				//$invoice_items = $invoice->invoiceItems;
				$payment = Payment::find()->where(['id' => $invoice->payment_id])->one();
				$customer = Customer::find()->where(['id' => $invoice->customer_id])->one();

				return $this->render('confirm', [
					'token' => $token,
					'invoice' => $invoice,
					'payment' => $payment,
					'customer' => $customer,
					'model' => $model,
				]);
			}
			
		}elseif($step == 'shipping'){
		
			$model = new ShippingAddressForm;
			//die(print_r($model));
			//die(print_r(\Yii::$app->cart->getShippingAddress()));
			$sid = \Yii::$app->cart->getShippingAddress();
			if($sa = ShippingAddress::find()->where(['id' => $sid])->one()) {
				$a = array(
					'ShippingAddressForm' => array(
						'first_name' => $sa->first,
						'last_name' => $sa->last,
						'email' => $sa->email,
						'phone' => $sa->phone,
						'address1' => $sa->address1,
						'address2' => $sa->address2,
						'city' => $sa->city,
						'state' => $sa->state,
						'postal_code' => $sa->zipcode,
					)
				);
				$model->load($a);
			}

			if ($model->load(Yii::$app->request->post()) && $model->startCheckout()) {
				return $this->redirect(['/checkout/method']);
			} else {
				return $this->render('shipping', [
					'model' => $model,
				]);
			}
			
		}elseif($step == 'success'){
			if(!$token = \Yii::$app->cart->getConfirmToken()) {
				return $this->redirect(['/shop']);
			}
			\Yii::$app->cart->clear();
			return $this->render('success');
			
		}else{
			throw new NotFoundHttpException('That part of the checkout process was not found.');
		}

        
    }
	
	public function actionCart()
    {
		if (!\Yii::$app->user->can('ecomOrdersCart')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
		if(count(\Yii::$app->cart->getItems()) == 0) {
			return $this->redirect(['/shop']);
		}
	
		//\Yii::$app->cart->clear();
	
        return $this->render('cart');
    }
	
	public function actionRemoveFromCart($uid = NULL)
	{
		//if (!\Yii::$app->user->can('ecomProductsCart')) {
		//	throw new ForbiddenHttpException('You do not have privileges to view this content.');
		//}
		
		if (!$uid OR !\Yii::$app->cart->remove($uid)) {
			throw new NotFoundHttpException('Item not found in cart.');
		}
	
		//\Yii::$app->cart->remove($uid);
	
        return $this->redirect(\Yii::$app->request->referrer);
	}

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
