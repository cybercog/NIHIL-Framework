<?php
namespace app\modules\domains\components\ResellBiz;

use app\modules\domains\components\ResellBiz;

class RBDomains extends ResellBiz
{
	public function __construct()
	{
		parent::__construct();
		$this->url .= '/domains';
	}
	
	private function available($domains, $tlds, $suggestAlternative = FALSE)
	{
		//https://test.httpapi.com/api/domains/available.json?auth-userid=0&api-key=key&domain-name=domain1&domain-name=domain2&tlds=com&tlds=net
		$this->url .= '/available.json';
		//$this->url .= '?auth-userid=558728&api-key=ImjNEWu799AF3od2UvCUE7gd5HnLtmZs&domain-name=domain1&domain-name=domain2&tlds=com&tlds=net';
		parent::addGetAuthData();
		parent::addGetData('domain-name', $domains);
		parent::addGetData('tlds', $tlds);
		if($suggestAlternative) {
			parent::addGetData('suggest-alternative', 1);
		}
		
		parent::process();
	}
	
	public function checkAvailablity($domains, $tlds)
	{
		//if(!$this->available($domains, $tlds)){
		//	die("Bad");
		//	return FALSE;
		//}
		$this->available($domains, $tlds);
		
		$ret = array();
		$ars = parent::getArrayResponse();
		//die(print_r($ars));
		foreach($ars as $key => $value){
			if($value['status'] == 'available') {
				$ret[] = array('domain' => $key, 'available' => 1);
			}else{
				$ret[] = array('domain' => $key, 'available' => 0);
			}
		}
		
		return $ret;
	}

	public function register($domainName, $years, $nameservers, $customer_id, $regContactId, $adminContactId, $techContactId, $billingContactid, $invoiceOption)
	{
		//https://test.httpapi.com/api/domains/register.xml?auth-userid=0&api-key=key&domain-name=domain.com&years=1&ns=ns1.domain.com&ns=ns2.domain.com&customer-id=0&reg-contact-id=0&admin-contact-id=0&tech-contact-id=0&billing-contact-id=0&invoice-option=KeepInvoice
		$this->url .= '/register.json';
	}
	
	public function transfer($domainName, $authCode, $nameservers, $customer_id, $regContactId, $adminContactId, $techContactId, $billingContactid, $invoiceOption)
	{
		//https://test.httpapi.com/api/domains/transfer.json?auth-userid=0&api-key=key&domain-name=domain.com&auth-code=auth-code&ns=ns1.domain.com&ns=ns2.domain.com&customer-id=0&reg-contact-id=0&admin-contact-id=0&tech-contact-id=0&billing-contact-id=0&invoice-option=KeepInvoice
		$this->url .= '/transfer.json';
	}
	
	public function renew($orderId, $years, $expDate, $invoiceOption)
	{
		//https://test.httpapi.com/api/domains/renew.json?auth-userid=0&api-key=key&order-id=562994&years=1&exp-date=1279012036&invoice-option=NoInvoice
		$this->url .= '/renew.json';
	}
	
	public function validateTransfer($domainName)
	{
		//https://test.httpapi.com/api/domains/validate-transfer.json?auth-userid=0&api-key=key&domain-name=domain.com
		$this->url .= '/validate-transfer.json';
	}
	
	public function setDomainName($domains){
		$this->setPostData('domain-name', $domains);
		return $this;
	}
	
	public function setTlds($tlds){
		$this->setPostData('tlds', $tlds);
		return $this;
	}
	
}