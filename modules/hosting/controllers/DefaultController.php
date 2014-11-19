<?php

namespace app\modules\hosting\controllers;

use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class DefaultController extends Controller
{
    public function actionIndex()
    {
		if (!\Yii::$app->user->can('hostingDefaultIndex')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
        return $this->render('index');
    }
	
	public function actionSharedHosting()
    {
		if (!\Yii::$app->user->can('hostingDefaultSharedHosting')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
        return $this->render('shared-hosting');
    }
	
	public function actionVpsHosting()
    {
		if (!\Yii::$app->user->can('hostingDefaultVpsHosting')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
        return $this->render('vps-hosting');
    }
	
	public function actionSslCertificates()
    {
		if (!\Yii::$app->user->can('hostingDefaultSslCertificates')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
        return $this->render('ssl-certificates');
    }
	
	public function actionPrivateEmail()
    {
		if (!\Yii::$app->user->can('hostingDefaultPrivateEmail')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
        return $this->render('private-email');
    }
	
	public function actionDedicatedServers()
    {
		if (!\Yii::$app->user->can('hostingDefaultDedicatedServers')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
        return $this->render('dedicated-servers');
    }
}
