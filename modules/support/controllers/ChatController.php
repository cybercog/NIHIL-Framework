<?php

namespace app\modules\support\controllers;

use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class ChatController extends Controller
{
    public function actionIndex()
    {
		if (!\Yii::$app->user->can('supportChatIndex')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
        return $this->render('index');
    }
}
