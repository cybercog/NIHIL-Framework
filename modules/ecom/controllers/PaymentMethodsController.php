<?php

namespace app\modules\ecom\controllers;

use Yii;
use app\modules\ecom\models\PaymentMethod;
use app\modules\ecom\models\search\PaymentMethodSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * PaymentMethodsController implements the CRUD actions for PaymentMethod model.
 */
class PaymentMethodsController extends Controller
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
     * Lists all PaymentMethod models.
     * @return mixed
     */
    public function actionIndex()
    {
		if (!\Yii::$app->user->can('ecomPaymentMethodsIndex')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $searchModel = new PaymentMethodSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PaymentMethod model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		if (!\Yii::$app->user->can('ecomPaymentMethodsView')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
	
	/**
     * Displays a single PaymentMethod model.
     * @param integer $id
     * @return mixed
     */
    public function actionDetails($id)
    {
		if (!\Yii::$app->user->can('ecomPaymentMethodsDetails')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PaymentMethod model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if (!\Yii::$app->user->can('ecomPaymentMethodsCreate')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $model = new PaymentMethod();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PaymentMethod model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		if (!\Yii::$app->user->can('ecomPaymentMethodsUpdate')) {
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
     * Deletes an existing PaymentMethod model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		if (!\Yii::$app->user->can('ecomPaymentMethodsDelete')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	/**
     * Lists all Payment Methods models.
     * @return mixed
     */
    public function actionList()
    {
		if (!\Yii::$app->user->can('ecomPaymentMethodsList')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $searchModel = new PaymentMethodSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the PaymentMethod model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PaymentMethod the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PaymentMethod::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
