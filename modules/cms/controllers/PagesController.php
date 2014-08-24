<?php

namespace app\modules\cms\controllers;

use Yii;
use app\modules\cms\models\Page;
use app\modules\cms\models\search\PageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

use app\modules\cms\models\PageView;

/**
 * PagesController implements the CRUD actions for Page model.
 */
class PagesController extends Controller
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
     * Lists all Page models.
     * @return mixed
     */
    public function actionIndex()
    {
		if (!\Yii::$app->user->can('cmsPagesIndex')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
        return $this->render('index', [
			'pages' => Page::findRecentPages(),
		]);
    }

    /**
     * Displays a single Page model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($slug)
    {
		if (!\Yii::$app->user->can('cmsPagesView')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
		$page = Page::findBySlug($slug);
		
		if (!$page) {
			throw new NotFoundHttpException('Page not found.');
		}
		
		$pageview = new PageView;
		$pageview->logPageView($page);
		
        return $this->render('view', [
            'page' => $page,
        ]);
    }
	
	/**
     * Displays a single Page model.
     * @param integer $id
     * @return mixed
     */
    public function actionDetails($id)
    {
		if (!\Yii::$app->user->can('cmsPagesDetails')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
        return $this->render('details', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Page model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if (!\Yii::$app->user->can('cmsPagesCreate')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
        $model = new Page();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Page model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		if (!\Yii::$app->user->can('cmsPagesUpdate')) {
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
     * Deletes an existing Page model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		if (!\Yii::$app->user->can('cmsPagesDelete')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	/**
     * Lists all Page models.
     * @return mixed
     */
    public function actionList()
    {
		if (!\Yii::$app->user->can('cmsPagesList')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
        $searchModel = new PageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Page::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
