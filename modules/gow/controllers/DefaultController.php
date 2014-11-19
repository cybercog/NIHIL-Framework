<?php

namespace app\modules\gow\controllers;

use Yii;
use yii\web\Controller;
use app\models\ContactForm;
use yii\web\ForbiddenHttpException;

class DefaultController extends Controller
{
	//public $layout = 'gow';
	public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
		if (\Yii::$app->user->isGuest) {
            return $this->redirect('/login',302);
        }
		
		if (!\Yii::$app->user->can('gowDefaultIndex')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/login']);
			}
		}
		
        return $this->render('index');
    }
	
	public function actionContact()
    {
		if (\Yii::$app->user->isGuest) {
            $this->layout = 'blank';
        }
	
		if (!\Yii::$app->user->can('gowDefaultContact')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/login']);
			}
		}
		
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['emails']['contact'])) {
            Yii::$app->session->setFlash('success', 'Thanks for reaching out.  Your message has been sent.');
            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }
	
}
