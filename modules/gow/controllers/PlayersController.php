<?php

namespace app\modules\gow\controllers;

use Yii;
use app\modules\gow\models\Player;
use app\modules\gow\models\search\PlayerSearch;
use app\modules\gow\models\forms\LoginForm;
use app\modules\gow\models\forms\RegisterForm;
use app\modules\gow\models\forms\ResetForm;
use app\modules\gow\models\forms\ChangePasswordForm;
use app\modules\gow\models\forms\VerificationForm;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PlayersController implements the CRUD actions for Player model.
 */
class PlayersController extends Controller
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
     * Lists all Player models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays a single Player model.
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
     * Displays the details for a single Player model.
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
     * Creates a new Player model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Player();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Player model.
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
     * Deletes an existing Player model.
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
     * Lists all Player models.
     * @return mixed
     */
    public function actionList()
    {
        $searchModel = new PlayerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	/**
     * Lists all Player models.
     * @return mixed
     */
    public function actionManage()
    {
        $searchModel = new PlayerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('manage', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	public function actionLogin()
	{
		$this->layout = 'blank';
		
		if (!\Yii::$app->user->isGuest) {
            return $this->redirect('/',302);
        }
		
		if (!\Yii::$app->user->can('gowPlayersLogin')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/login']);
			}
		}

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
			Yii::$app->session->setFlash('success', 'You are now logged in.');
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
	}
	
	public function actionLogout()
	{
		if (\Yii::$app->user->isGuest) {
            return $this->redirect('/login',302);
        }
		
		if (!\Yii::$app->user->can('gowPlayersLogout')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/login']);
			}
		}
		
		Yii::$app->user->logout();
		
		Yii::$app->session->setFlash('success', 'You are now logged out.');
		return $this->redirect(['/login']);
	}
	
	public function actionRegister()
	{
		$this->layout = 'blank';
		
		if (!\Yii::$app->user->isGuest) {
            return $this->redirect('/',302);
        }
		
		if (!\Yii::$app->user->can('gowPlayersRegister')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/login']);
			}
		}
		
		$model = new RegisterForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->register()) {
                if (Yii::$app->getUser()->login($user)) {
					Yii::$app->session->setFlash('success', 'Thanks for registering - check your email.  You are now logged in.');
                    //return $this->goHome(); // go to user portal
					return $this->redirect('/',302);
                }
				Yii::$app->session->setFlash('success', 'Thanks for registering - check your email.  You can login <a href="#" class="alert-link">here</a>.');
				return $this->goHome();
            }
        }

        return $this->render('register', [
            'model' => $model,
        ]);
	}

    /**
     * Finds the Player model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Player the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Player::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
