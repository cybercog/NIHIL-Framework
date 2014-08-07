<?php

namespace app\modules\ecom\controllers;

use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class DefaultController extends Controller
{
    public function actionIndex()
    {
		if (!\Yii::$app->user->can('ecomDefaultIndex')) {
			throw new ForbiddenHttpException('You do not have privileges to view this content.');
		}
		
        return $this->render('index');
    }
}
