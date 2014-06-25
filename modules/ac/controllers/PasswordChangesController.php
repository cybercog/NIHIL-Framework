<?php

namespace app\modules\ac\controllers;

use Yii;
use app\modules\ac\models\PasswordChanges;
use app\modules\ac\models\search\PasswordChangesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * PasswordChangesController implements the CRUD actions for PasswordChanges model.
 */
class PasswordChangesController extends Controller
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
		if (!\Yii::$app->user->can('acPasswordChangesIndex')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
        return $this->render('index');
    }

    /**
     * Displays a single PasswordChanges model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		if (!\Yii::$app->user->can('acPasswordChangesView')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PasswordChanges model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if (!\Yii::$app->user->can('acPasswordChangesCreate')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
        $model = new PasswordChanges();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PasswordChanges model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		if (!\Yii::$app->user->can('acPasswordChangesUpdate')) {
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
     * Deletes an existing PasswordChanges model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		if (!\Yii::$app->user->can('acPasswordChangesDelete')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	/**
     * Lists all PasswordChanges models.
     * @return mixed
     */
    public function actionList()
    {
		if (!\Yii::$app->user->can('acPasswordChangesList')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
        $searchModel = new PasswordChangesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the PasswordChanges model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PasswordChanges the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PasswordChanges::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
