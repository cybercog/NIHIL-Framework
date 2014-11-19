<?php

namespace app\modules\support\controllers;

use Yii;
use app\modules\support\models\Faq;
use app\modules\support\models\search\FaqSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * FaqsController implements the CRUD actions for Faq model.
 */
class FaqsController extends Controller
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
     * Lists all Faq models.
     * @return mixed
     */
    public function actionIndex()
    {
		if (!\Yii::$app->user->can('supportFaqsIndex')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
        return $this->render('index', [
			'faqs' => Faq::find()->indexBy('order')->all(),
		]);
    }

    /**
     * Displays a single Faq model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		if (!\Yii::$app->user->can('supportFaqsView')) {
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
     * Displays the details for a single Faq model.
     * @param integer $id
     * @return mixed
     */
    public function actionDetails($id)
    {
		if (!\Yii::$app->user->can('supportFaqsDetails')) {
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
     * Creates a new Faq model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if (!\Yii::$app->user->can('supportFaqsCreate')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
        $model = new Faq();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Faq model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		if (!\Yii::$app->user->can('supportFaqsUpdate')) {
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
     * Deletes an existing Faq model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		if (!\Yii::$app->user->can('supportFaqsDelete')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
        $this->findModel($id)->delete();

        return $this->redirect(['list']);
    }
	
	    /**
     * Lists all Faq models.
     * @return mixed
     */
    public function actionList()
    {
		if (!\Yii::$app->user->can('supportFaqsList')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
        $searchModel = new FaqSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the Faq model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Faq the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Faq::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
