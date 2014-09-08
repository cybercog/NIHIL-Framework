<?php

namespace app\modules\core\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
		if (!\Yii::$app->user->can('coreDefaultIndex')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
        return $this->render('index');
    }
}
