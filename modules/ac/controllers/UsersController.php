<?php

namespace app\modules\ac\controllers;

use Yii;
use app\modules\ac\models\Users;
use app\modules\ac\models\AuthKeys;
use app\modules\ecom\models\Customer;
use app\modules\ac\models\search\UsersSearch;
use app\modules\ac\models\forms\LoginForm;
use app\modules\ac\models\forms\RegisterForm;
use app\modules\ac\models\forms\ResetForm;
use app\modules\ac\models\forms\ChangePasswordForm;
use app\modules\ac\models\forms\VerificationForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * UsersController implements the CRUD actions for Users model.
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
     * Index action.
     * @return mixed
     */
    public function actionIndex()
    {
		if (!\Yii::$app->user->can('acUsersIndex')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        return $this->render('index');
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		if (!\Yii::$app->user->can('acUsersView')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if (!\Yii::$app->user->can('acUsersCreate')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
        $model = new Users();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		if (!\Yii::$app->user->can('acUsersUpdate', ['user' => Users::findOne($id)])) {
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
     * Deletes an existing Users model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		if (!\Yii::$app->user->can('acUsersDelete')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $this->findModel($id)->delete();

        return $this->redirect(['list']);
    }
	
	/**
     * Lists all Users models.
     * @return mixed
     */
    public function actionList()
    {
		if (!\Yii::$app->user->can('acUsersList')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	/**
     * Login action.
     * @return mixed
     */
    public function actionLogin()
    {
		if (!\Yii::$app->user->isGuest) {
            return $this->redirect('/ac/users',302);
        }
		
		if (!\Yii::$app->user->can('acUsersLogin')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
	
	/**
     * Logout action.
     * @return mixed
     */
    public function actionLogout()
    {
		if (\Yii::$app->user->isGuest) {
            return $this->redirect('/ac/users/login',302);
        }
		
		Yii::$app->user->logout();
		
        return $this->render('logout');
    }
	
	/**
     * Register action.
     * @return mixed
     */
    public function actionRegister()
    {
		if (!\Yii::$app->user->isGuest) {
            return $this->redirect('/ac/users',302);
        }
		
		if (!\Yii::$app->user->can('acUsersRegister')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
		$model = new RegisterForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->register()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('register', [
            'model' => $model,
        ]);

    }
	
	/**
     * Verify action.
     * @return mixed
     */
    public function actionVerify($code=NULL)
    {
		if (!\Yii::$app->user->can('acUsersVerify')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
		$model = new VerificationForm();
	
		if($code AND !Yii::$app->request->post()){
			//
			$model->code = $code;
			if ($user = $model->verify()) {
				return $this->redirect('/ac/users/login',302);
            }else{
				return $this->redirect('/ac/users/verify',302);
			}
		}
	
		if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->verify()) {
				return $this->redirect('/ac/users/login',302);
            }
        }

        return $this->render('verify', [
            'model' => $model,
        ]);
		
    }
	
	/**
     * Verify action.
     * @return mixed
     */
    public function actionReset()
    {
		if(!\Yii::$app->user->isGuest) {
			return $this->redirect('/ac/users',302);
		}
		
		if (!\Yii::$app->user->can('acUsersReset')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
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
	
	/**
     * Verify action.
     * @return mixed
     */
    public function actionChangePassword($code = NULL)
    {
		$model = new ChangePasswordForm();
		
		if(\Yii::$app->user->isGuest AND !$authkey = AuthKeys::findByCode($code, 4)) {
			return $this->redirect('/ac/users/reset',302);
		}
		
		if (!\Yii::$app->user->can('acUsersChangePassword')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
		if ($model->load(Yii::$app->request->post())) {
			if(!\Yii::$app->user->isGuest) {
				
				if($user = $model->changeOwnPassword()) {
					Yii::$app->user->logout();
					return $this->redirect('/ac/users/login',302);
				}
				
			}else{
			
				if ($user = $model->changePassword($authkey)) {
					return $this->redirect('/ac/users/login',302);
				}
				
			}	
            
        }

        return $this->render('change-password', [
            'model' => $model,
        ]);
		
    }
	
	/**
     * Settings action.
     * @return mixed
     */
    public function actionSettings()
    {
		if (!\Yii::$app->user->can('acUsersSettings')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
	
        return $this->render('settings', [
            'user' => Yii::$app->user->identity,
			'customer' => Customer::find()->where(['user_id' => Yii::$app->user->identity->getUserID()])->one(),
        ]);
    }

    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
}
