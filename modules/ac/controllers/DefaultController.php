<?php

namespace app\modules\ac\controllers;

use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class DefaultController extends Controller
{
    public function actionIndex()
    {
		if (!\Yii::$app->user->can('acDefaultIndex')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
        return $this->render('index');
    }
}
