<?php
/**
 * The FirstData. Include this file in your project.
 *
 * @package FirstData
 */
namespace app\modules\ecom\components;

use Yii;

use app\modules\ecom\components\firstdata\FirstDataAPI;


class FirstData extends FirstDataAPI
{

	public function __construct()
	{
		//die(print_r(Yii::$app->params['firstdata']));
		if(isset(Yii::$app->params['firstdata'])) {
			parent::__construct(Yii::$app->params['firstdata']['username'], Yii::$app->params['firstdata']['password'], Yii::$app->params['firstdata']['debug']);
		}else{
			die("FirstData is not configured correctly.");
		}
	}

}