<?php

namespace app\modules\core\controllers;

use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class SearchController extends Controller
{
	public $defaultAction = 'search';

    public function actionSearch()
    {
		if (!\Yii::$app->user->can('coreSearchSearch')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
        return $this->render('search');
    }
}
