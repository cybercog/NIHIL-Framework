<?php

namespace app\modules\ac\controllers;

use Yii;
use app\modules\ac\models\SessionLog;
use app\modules\ac\models\search\SessionLogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * SessionLogsController implements the CRUD actions for SessionLog model.
 */
class SessionLogsController extends Controller
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
     * Lists all SessionLog models.
     * @return mixed
     */
    public function actionIndex()
    {
		if (!\Yii::$app->user->can('acSessionLogsIndex')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
        return $this->render('index');
    }

    /**
     * Displays a single SessionLog model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		if (!\Yii::$app->user->can('acSessionLogsView')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
	
	/**
     * Displays the details for a single SessionLog model.
     * @param integer $id
     * @return mixed
     */
    public function actionDetails($id)
    {
		if (!\Yii::$app->user->can('acSessionLogsDetails')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
        return $this->render('details', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SessionLog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if (!\Yii::$app->user->can('acSessionLogsCreate')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
        $model = new SessionLog();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SessionLog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		if (!\Yii::$app->user->can('acSessionLogsUpdate')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
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
     * Deletes an existing SessionLog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		if (!\Yii::$app->user->can('acSessionLogsDelete')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	    /**
     * Lists all SessionLog models.
     * @return mixed
     */
    public function actionList()
    {
		if (!\Yii::$app->user->can('acSessionLogsList')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
        $searchModel = new SessionLogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the SessionLog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SessionLog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SessionLog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
