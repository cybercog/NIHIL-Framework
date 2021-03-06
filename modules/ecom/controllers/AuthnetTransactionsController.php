<?php

namespace app\modules\ecom\controllers;

use Yii;
use app\modules\ecom\models\AuthnetTransaction;
use app\modules\ecom\models\search\AuthnetTransactionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * AuthnetTransactionsController implements the CRUD actions for AuthnetTransaction model.
 */
class AuthnetTransactionsController extends Controller
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
     * Lists all AuthnetTransaction models.
     * @return mixed
     */
    public function actionIndex()
    {
		if (!\Yii::$app->user->can('ecomAuthnetTransactionsIndex')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        return $this->render('index');
    }

    /**
     * Displays a single AuthnetTransaction model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		if (!\Yii::$app->user->can('ecomAuthnetTransactionsView')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
	
	/**
     * Displays a single AuthnetTransaction model.
     * @param integer $id
     * @return mixed
     */
    public function actionDetails($id)
    {
		if (!\Yii::$app->user->can('ecomAuthnetTransactionsDetails')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AuthnetTransaction model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if (!\Yii::$app->user->can('ecomAuthnetTransactionsCreate')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $model = new AuthnetTransaction();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AuthnetTransaction model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		if (!\Yii::$app->user->can('ecomAuthnetTransactionsUpdate')) {
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
     * Deletes an existing AuthnetTransaction model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		if (!\Yii::$app->user->can('ecomAuthnetTransactionsDelete')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	/**
     * Lists all Authnet Transactions models.
     * @return mixed
     */
    public function actionList()
    {
		if (!\Yii::$app->user->can('ecomAuthnetTransactionsList')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $searchModel = new AuthnetTransactionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the AuthnetTransaction model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AuthnetTransaction the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthnetTransaction::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
