<?php

namespace app\modules\domains\controllers;

use yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

use app\modules\domains\components\ResellBiz\RBDomains;

class DefaultController extends Controller
{
    public function actionIndex()
    {
		if (!\Yii::$app->user->can('domainsDefaultIndex')) {
			if (!\Yii::$app->user->isGuest) {
				throw new ForbiddenHttpException('You do not have privileges to view this content.');
			}else{
				Yii::$app->session->setFlash('danger', 'You do not have privileges to view this content. Please login to continue.');
				return $this->redirect(['/ac/users/login']);
			}
		}
		
		//$url = 'https://test.httpapi.com/api/domains/available.json?auth-userid=558728&api-key=ImjNEWu799AF3od2UvCUE7gd5HnLtmZs&domain-name=domain1&domain-name=domain2&tlds=com&tlds=net';
		//$response = file_get_contents($url);
		//die(print_r(json_decode($response, true), TRUE));
		
		// Get cURL resource
		//$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		//curl_setopt_array($curl, array(
		//	CURLOPT_RETURNTRANSFER => 1,
		//	CURLOPT_URL => $url,
		//	CURLOPT_USERAGENT => 'Codular Sample cURL Request'
		//));
		// Send the request & save response to $resp
		//$resp = curl_exec($curl);
		// Close request to clear up some resources
		//curl_close($curl);
		//die(print_r($resp, FALSE));
		
		$rbDomains = new RBDomains();
		//$rbDomains->available('example', array('com', 'net'));
		//die(print_r($rbDomains->getArrayResponse()));
		//$results = $rbDomains->checkAvailablity(array('example', 'domain', 'apples'), array('com', 'net'));
		//die(print_r($results));
		
        return $this->render('index');
    }
}
