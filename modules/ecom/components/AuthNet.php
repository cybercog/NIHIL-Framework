<?php
namespace app\modules\ecom\components;

use yii\base\Object;
use AuthorizeNetAIM;
use AuthorizeNetCIM;
use AuthorizeNetARB;
use AuthorizeNetTD;

class AuthNet extends Object
{
    private $api_login;
    private $trans_key;
	private $mode = 'debug';
	
	public $aim;
	public $cim;
	public $arb;
	public $td;

    public function __construct()
    {
        // ... initialization before configuration is applied
		$this->mode = \Yii::$app->params['authnet']['mode'];
		$this->api_login = \Yii::$app->params['authnet'][$this->mode]['api_login'];
		$this->trans_key = \Yii::$app->params['authnet'][$this->mode]['trans_key'];
		
		$this->aim = new AuthorizeNetAIM($this->api_login, $this->trans_key);
		$this->cim = new AuthorizeNetCIM($this->api_login, $this->trans_key);
		$this->arb = new AuthorizeNetARB($this->api_login, $this->trans_key);
		$this->td = new AuthorizeNetTD($this->api_login, $this->trans_key);
		
		if($this->mode == 'live') {
			$this->aim->setSandbox(FALSE);
			$this->cim->setSandbox(FALSE);
			$this->arb->setSandbox(FALSE);
			$this->td->setSandbox(FALSE);
		}else{
			$this->aim->setSandbox(TRUE);
			$this->cim->setSandbox(TRUE);
			$this->arb->setSandbox(TRUE);
			$this->td->setSandbox(TRUE);
		}
		
        parent::__construct();
    }

    public function init()
    {
        parent::init();

        // ... initialization after configuration is applied
    }

}