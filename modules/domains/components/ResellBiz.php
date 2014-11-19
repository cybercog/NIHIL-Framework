<?php
namespace app\modules\domains\components;

use yii\base\Object;

class ResellBiz extends Object
{
    protected $username = NULL;
    protected $password = NULL;
	protected $mode = 'demo';
	
	const LIVE_API_URL = 'https://httpapi.com/api';
	const DEMO_API_URL = 'https://test.httpapi.com/api';
	
	public $url = NULL;
	public $response = NULL;
	
	public static $CURL_OPTS = array(
	    CURLOPT_CONNECTTIMEOUT => 30,
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_TIMEOUT        => 60,
	    CURLOPT_FRESH_CONNECT  => 1,
		CURLOPT_PORT		   => 443,
	    CURLOPT_USERAGENT      => 'NIHIL Framework',
	    CURLOPT_FOLLOWLOCATION => false,
		CURLOPT_RETURNTRANSFER => true,
		//CURLOPT_CUSTOMREQUEST  => 'POST',
		//CURLOPT_SSLVERSION => 3,
		//CURLOPT_SSL_CIPHER_LIST => 'SSLv3',
		//CURLOPT_HTTPHEADER	   => array('Content-Type: application/json; charset=UTF-8;','Accept: application/json' ),
	);
	
	public function __construct($config = [])
    {
        // ... initialization before configuration is applied
		if(isset(\Yii::$app->params['resellbiz'])) {
			$this->mode = \Yii::$app->params['resellbiz']['mode'];
			$this->username = \Yii::$app->params['resellbiz'][$this->mode]['username'];
			$this->password = \Yii::$app->params['resellbiz'][$this->mode]['password'];
			$this->url = $this->getApiUrl();
		}else{
			die("ResellBiz is not configured correctly.");
		}
		
        parent::__construct($config);
    }
	
	public function init()
    {
        parent::init();

        // ... initialization after configuration is applied
    }
	
	public function process()
	{
		return $this->doRequest();
	}
	
	/**
   	* Makes an HTTP request. This method can be overriden by subclasses if
   	* developers want to do fancier things or use something other than curl to
   	* make the request.
   	*
   	* @param CurlHandler optional initialized curl handle
   	* @return String the response text
   	*/
  	protected function doRequest($ch=null) {
    	if (!$ch) {
      		$ch = curl_init();
    	}
		
		// Set some options
    	$opts = self::$CURL_OPTS;
		$opts[CURLOPT_URL] = $this->url;

		// set options
		curl_setopt_array($ch, $opts);
		
		// Send the request & save response to $resp
		$resp = curl_exec($ch);
		
		// Close request to clear up some resources
		curl_close($ch);
		
		$this->response = $resp;
		
		if($this->response) { 
			return TRUE; 
		}else{
			return FALSE;
		}
		
    }
	
	public function addGetData($name, $values)
	{
		if(is_array($values)){
			foreach($values as $value) {
				$this->url .= '&' . $name . '=' . urlencode($value);
			}
		}else{
			$this->url .= '&' . $name . '=' . urlencode($values);
		}
		return $this;
	}
	
	public function addGetAuthData()
	{
		$this->url .= '?auth-userid=' . $this->username . '&api-key=' . $this->password;
	}
	
	public function getArrayResponse()
	{
		return json_decode($this->response, true);
	}
	
	
	
	
	
	
	public function setUsername($username)
	{
		$this->username = $username;
	}
	
	public function getUsername()
	{
		return $this->username;
	}
	
	public function setPassword($password)
	{
		$this->password = $password;
	}
	
	public function getPassword()
	{
		return $this->password;
	}
	
	public function setMode($mode)
	{
		$this->mode = $mode;
	}
	
	public function getMode()
	{
		return $this->mode;
	}
	
	public function getApiUrl()
	{
		if($this->mode == 'live'){
			return self::LIVE_API_URL;
		}else{
			return self::DEMO_API_URL;
		}
	}
	
}