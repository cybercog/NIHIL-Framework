<?php

namespace app\modules\ac\controllers;

use Yii;
use app\modules\ac\models\User;
use app\modules\ac\models\search\UserSearch;
use app\modules\ac\models\AuthKey;
use app\modules\cms\models\Post;
use app\modules\ac\models\forms\LoginForm;
use app\modules\ac\models\forms\RegisterForm;
use app\modules\ac\models\forms\SignUpForm;
use app\modules\ac\models\forms\ResetForm;
use app\modules\ac\models\forms\ChangePasswordForm;
use app\modules\ac\models\forms\VerificationForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * UsersController implements the CRUD actions for User model.
 */
class UsersController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
		if (!\Yii::$app->user->can('acUsersIndex')) {
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
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		if (!\Yii::$app->user->can('acUsersView')) {
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
     * Displays the details for a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionDetails($id)
    {
		if (!\Yii::$app->user->can('acUsersDetails')) {
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if (!\Yii::$app->user->can('acUsersCreate')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		if (!\Yii::$app->user->can('acUsersUpdate')) {
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
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		if (!\Yii::$app->user->can('acUsersDelete')) {
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
     * Lists all User models.
     * @return mixed
     */
    public function actionList()
    {
		if (!\Yii::$app->user->can('acUsersList')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	public function actionLogin()
	{
		//$this->layout = 'blank-dark';
	
		if (!\Yii::$app->user->isGuest) {
            return $this->redirect('/ac/users',302);
        }
		
		if (!\Yii::$app->user->can('acUsersLogin')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
			Yii::$app->session->setFlash('success', 'You are now logged in.');
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
				'posts' => Post::findPublishedPosts(5),
            ]);
        }
	}
	
	public function actionLogout()
	{
		if (\Yii::$app->user->isGuest) {
            return $this->redirect('/ac/users/login',302);
        }
		
		if (!\Yii::$app->user->can('acUsersLogout')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
		Yii::$app->user->logout();
		
		Yii::$app->session->setFlash('success', 'You are now logged out.');
		//return $this->render('logout');
		return $this->redirect(['/ac/users/login']);
	}
	
	public function actionRegister()
	{
		//$this->layout = 'blank-dark';
	
		if (!\Yii::$app->user->isGuest) {
            return $this->redirect('/ac/users',302);
        }
		
		if (!\Yii::$app->user->can('acUsersRegister')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
		$model = new SignUpForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->register()) {
                if (Yii::$app->getUser()->login($user)) {
					Yii::$app->session->setFlash('success', 'Thanks for registering - check your email.  You are now logged in.');
                    //return $this->goHome(); // go to user portal
					return $this->redirect('/ac/users',302);
                }
				Yii::$app->session->setFlash('success', 'Thanks for registering - check your email.  You can login <a href="#" class="alert-link">here</a>.');
				return $this->goHome();
            }
        }

        return $this->render('register', [
            'model' => $model,
        ]);
	}
	
	public function actionSignup()
	{
		//$this->layout = 'blank-dark';
	
		if (!\Yii::$app->user->isGuest) {
            return $this->redirect('/ac/users',302);
        }
		
		if (!\Yii::$app->user->can('acUsersSignup')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/login']);
			}
		}
		
		$model = new SignUpForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->register()) {
                //if (Yii::$app->getUser()->login($user)) {
				//	Yii::$app->session->setFlash('success', 'Thanks for registering - check your email.  You are now logged in.');
                //   //return $this->goHome(); // go to user portal
				//	return $this->redirect(['/verify']);
                //}
				//Yii::$app->session->setFlash('success', 'Thanks for registering - check your email.  You can login <a href="#" class="alert-link">here</a>.');
				Yii::$app->session->setFlash('success', 'Thanks for registering - check your email for a verification code.');
				return $this->redirect(['/verify']);
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
	}
	
	public function actionDashboard()
	{
		//$this->layout = 'dashboard';
		
		if (!\Yii::$app->user->can('acUsersDashboard')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/login']);
			}
		}
		
		return $this->render('dashboard');
	}	
	
	public function actionVerify($code = NULL)
	{
		if (!\Yii::$app->user->can('acUsersVerify')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
		$model = new VerificationForm();
	
		if($code AND !Yii::$app->request->post()){
			//
			$model->code = $code;
			if ($user = $model->verify()) {
				if (Yii::$app->getUser()->login($user)) {
					Yii::$app->session->setFlash('success', 'Thanks for verifying your account.  You are now logged in and free to explore.');
                   //return $this->goHome(); // go to user portal
					return $this->redirect(['/dashboard']);
                }
            }else{
				return $this->redirect('/verify',302);
			}
		}
	
		if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->verify()) {
				if (Yii::$app->getUser()->login($user)) {
					Yii::$app->session->setFlash('success', 'Thanks for verifying your account.  You are now logged in and free to explore.');
                   //return $this->goHome(); // go to user portal
					return $this->redirect(['/dashboard']);
                }
				return $this->redirect('/login',302);
            }
        }

        return $this->render('verify', [
            'model' => $model,
        ]);
	}
	
	public function actionReset()
	{
		if(!\Yii::$app->user->isGuest) {
			return $this->redirect('/account/overview',302);
		}
		
		if (!\Yii::$app->user->can('acUsersReset')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
	
		$model = new ResetForm();
		
		if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->resetPassword()) {
				return $this->goHome();
            }
        }

        return $this->render('reset', [
            'model' => $model,
        ]);
	}
	
	public function actionChangePassword($code = NULL)
	{
		if (!\Yii::$app->user->can('acUsersChangePassword')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
		$model = new ChangePasswordForm();
		
		if(\Yii::$app->user->isGuest AND !$authkey = AuthKeys::findByCode($code, 4)) {
			return $this->redirect('/reset',302);
		}
		
		if ($model->load(Yii::$app->request->post())) {
			if(!\Yii::$app->user->isGuest) {
				
				if($user = $model->changeOwnPassword()) {
					Yii::$app->user->logout();
					return $this->redirect('/login',302);
				}
				
			}else{
			
				if ($user = $model->changePassword($code)) {
					return $this->redirect('/login',302);
				}
				
			}	
            
        }

        return $this->render('change-password', [
            'model' => $model,
        ]);
	}
	
	/**
     * Lists all User models.
     * @return mixed
     */
    public function actionSettings()
    {
		if (!\Yii::$app->user->can('acUsersSettings')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
        return $this->render('settings', [
			'user' => User::findOne(\Yii::$app->user->getIdentity()->id),
        ]);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
