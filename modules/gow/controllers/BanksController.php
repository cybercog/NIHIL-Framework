<?php

namespace app\modules\gow\controllers;

use Yii;
use app\modules\gow\models\Bank;
use app\modules\gow\models\Player;
use app\modules\gow\models\forms\ReconcileForm;
use app\modules\gow\models\search\BankSearch;
use app\modules\gow\models\search\BankTransactionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BanksController implements the CRUD actions for Bank model.
 */
class BanksController extends Controller
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
     * Lists all Bank models.
     * @return mixed
     */
    public function actionIndex()
    {	
		$searchModel = new BankTransactionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
        return $this->render('index', [
			'bank' => $this->findModel(2),
			'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
		]);
    }

    /**
     * Displays a single Bank model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
	
	/**
     * Displays the details for a single Bank model.
     * @param integer $id
     * @return mixed
     */
    public function actionDetails($id)
    {
        return $this->render('details', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Bank model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bank();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Bank model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
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
     * Deletes an existing Bank model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	    /**
     * Lists all Bank models.
     * @return mixed
     */
    public function actionList()
    {
        $searchModel = new BankSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	/**
     * Lists all Bank models.
     * @return mixed
     */
    public function actionAlliance()
    {
        return $this->render('alliance');
    }
	
	/**
     * Lists all Bank models.
     * @return mixed
     */
    public function actionBalance()
    {
        return $this->render('balance', [
			'players' => Player::find()->where(['user_id' => \Yii::$app->user->getIdentity()->id])->all(),
		]);
    }
	
	/**
     * Lists all Bank models.
     * @return mixed
     */
    public function actionReconcile()
    {	
		$searchModel = new BankTransactionSearch();
        $dataProvider = $searchModel->reconcile(Yii::$app->request->queryParams);
		
        return $this->render('reconcile', [
			'bank' => $this->findModel(2),
			'model' => new ReconcileForm,
			'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
		]);
    }

    /**
     * Finds the Bank model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bank the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bank::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
