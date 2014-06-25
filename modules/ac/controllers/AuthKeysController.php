<?php

namespace app\modules\ac\controllers;

use Yii;
use app\modules\ac\models\AuthKeys;
use app\modules\ac\models\search\AuthKeysSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * AuthKeysController implements the CRUD actions for AuthKeys model.
 */
class AuthKeysController extends Controller
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
     * Index Action.
     * @return mixed
     */
    public function actionIndex()
    {
		if (!\Yii::$app->user->can('acAuthKeysIndex')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
        return $this->render('index');
    }

    /**
     * Displays a single AuthKeys model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		if (!\Yii::$app->user->can('acAuthKeysView')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AuthKeys model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if (!\Yii::$app->user->can('acAuthKeysCreate')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
        $model = new AuthKeys();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AuthKeys model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		if (!\Yii::$app->user->can('acAuthKeysUpdate')) {
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
     * Deletes an existing AuthKeys model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		if (!\Yii::$app->user->can('acAuthKeysDelete')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	/**
     * Lists all AuthKeys models.
     * @return mixed
     */
    public function actionList()
    {
		if (!\Yii::$app->user->can('acAuthKeysList')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
        $searchModel = new AuthKeysSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the AuthKeys model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AuthKeys the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthKeys::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
