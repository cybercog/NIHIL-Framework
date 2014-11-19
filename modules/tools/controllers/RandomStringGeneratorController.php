<?php

namespace app\modules\tools\controllers;

use yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;

use app\modules\tools\models\forms\RandomStringGeneratorForm;

class RandomStringGeneratorController extends Controller
{
    public function actionIndex()
    {
		if (!\Yii::$app->user->can('toolsRandomStringGeneratorIndex')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
        $model = new RandomStringGeneratorForm();
        if ($model->load(Yii::$app->request->post()) && $strings = $model->generateStrings()) {
			Yii::$app->session->setFlash('success', 'You successfully generated ' . $model->count . ' strings.');
            return $this->render('index', [
                'strings' => $strings,
				'model' => $model,
            ]);
        } else {
			if(!$model->count) { $model->count = 1; }
			if(!$model->length) { $model->length = 16; }
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }
}
