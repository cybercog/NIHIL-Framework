<?php

namespace app\modules\ecom\models\forms;

use Yii;
use yii\base\Model;

use app\modules\ecom\models\Invoice;
use app\modules\ecom\models\ShippingAddress;

use app\modules\ecom\components\usps\USPSRate;
use app\modules\ecom\components\usps\USPSRatePackage;

/**
 * DonateForm is the model behind the donate form.
 */
class ShippingMethodForm extends Model 
{

	private $shipping;
	
    public $method;

    /**
     * @var 
     */
    protected $_shipping_address = false;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [["method"], "required"],
        ];
    }
	
	/**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'method' => 'USPS',
        ];
    }
	
	public function methodsRadio()
	{
		return array(
			1 => '$' . number_format($this->shipping['rate'],2) . ' ' . $this->shipping['name'],
		);
	}
	
	public function saveShippingMethod($rate) 
	{
		if(\Yii::$app->cart->addShippingRate($rate)) {
			return TRUE;
		}
		
		return FALSE;
	}
	
	public function calcUSPSShipping()
	{
		$orderContainers = $this->findCartPackaging();
		$containers = $this->getContainers();
		$rate = new USPSRate;
		
		foreach($orderContainers as $key => $c) {
		
			$package1 = new USPSRatePackage;
			$package1->setService(USPSRatePackage::SERVICE_PRIORITY);
			$package1->setFirstClassMailType(USPSRatePackage::MAIL_TYPE_PACKAGE_SERVICE);
			$package1->setZipOrigination(37343);
			$package1->setZipDestination(91730);
			$package1->setPounds(1);
			$package1->setOunces(5.0);
			$package1->setContainer($containers[$c]['name']);
			$package1->setSize(USPSRatePackage::SIZE_REGULAR);
			$package1->setField('Machinable', true);

			// add the package to the rate stack
			$rate->addPackage($package1);
		
		}
		
		$rate->getRate();
		//die(print_r($rate->getArrayResponse()['RateV4Response']['Package']['Postage']['Rate']));
		$shipping = 0;
		$ar = $rate->getArrayResponse();
		//die(print_r($ar));
		if(count($rate->getPostFields()['Package']) == 1) {
			
			$shipping += $ar['RateV4Response']['Package']['Postage']['Rate'];
			
		}elseif(count($rate->getPostFields()['Package']) > 1) {
			
			foreach($ar['RateV4Response']['Package'] as $package) {
			
				//die(print_r($package));
				$shipping += $package['Postage']['Rate'];
				
			}
			
		}else{
			return FALSE;
		}
		
		//die(print_r($rate->getRate()));
		//die(print_r($rate->getArrayResponse()));
		//die($shipping);
		$this->shipping = array('rate' => $shipping, 'name' => 'Flat Rate Box');
		
		return $shipping;
	}
	
	
	
	public function calcShipping() 
	{
		$matrix = array(
			'stickers' => array(
				'product_ids' => array(1),
				'rates' => array(
					0 => 0.00,
					1 => 1.00,
					2 => 1.00,
					3 => 1.00,
					4 => 1.00,
					5 => 1.00,
					6 => 1.00,
					7 => 1.00,
					8 => 1.00,
					9 => 1.00,
					10 => 1.00,
				),
			),
			'tshirts' => array(
				'product_ids' => array(2, 3),
				'rates' => array(
					0 => 0.00,
					1 => 5.80,
					2 => 5.80,
					3 => 12.80,
					4 => 12.80,
					5 => 12.80,
					6 => 12.80,
					7 => 17.45,
					8 => 17.45,
					9 => 17.45,
					10 => 17.45,
				),
			),
			'jackets' => array(
				'product_ids' => array(4, 5),
				'rates' => array(
					0 => 0.00,
					1 => 5.80,
					2 => 12.80,
					3 => 12.80,
					4 => 17.45,
					5 => 17.45,
				),
			),
		);
	}
	
	public function findLargestItemInCart()
	{
		$items = \Yii::$app->cart->getItems();
		//die(print_r($items));
		$a = array();
		foreach($items as $key => $item) {
			$a[$item['productAttribute']->shipping_volume] = $key;
		}
		arsort($a);
		//die(print_r($a));
	}
	
	public function findShippingContainer()
	{
		$containers = $this->getContainers();
		
		$items = \Yii::$app->cart->getItems();
		
		$v = 0;
		$sizes = array('w' => array(), 'l' => array(), 'h' => array());
		foreach($items as $key => $item) {
			$v += ($item['quantity'] * $item['productAttribute']->shipping_volume);
			$sizes['w'][] = $item['productAttribute']->shipping_width;
			$sizes['l'][] = $item['productAttribute']->shipping_length;
			$sizes['h'][] = $item['productAttribute']->shipping_height;
		}
		
		arsort($sizes['w']);
		arsort($sizes['l']);
		arsort($sizes['h']);
		
		die(print_r($this->findCartPackaging()));
		
		foreach($containers as $container) {
			if($container['volume'] * .8 >= $v) {
				if($this->doesItFit($container, $sizes)) {
					die($container['name']);
				}
			}
		}
		
		
		
		die("Does not fit in one box");
	}
	
	public function findCartVolume()
	{
		$items = \Yii::$app->cart->getItems();
		
		$v = 0;
		foreach($items as $key => $item) {
			$v += ($item['quantity'] * $item['productAttribute']->shipping_volume);
		}
		
		return $v;
		
	}
	
	public function findCartPackaging()
	{
		$containers = $this->getContainers();
		$items = \Yii::$app->cart->getItems();
		
		$v = 0;
		$c = 0;
		$cs = array();
		
		foreach($items as $key => $item) {
		
			while(!$this->doesItFit($containers[$c], array('w' => array($item['productAttribute']->shipping_width), 'l' => array($item['productAttribute']->shipping_length), 'h' => array($item['productAttribute']->shipping_height)))) {
				$c++;
			}
			
			for($q = 1; $q <= $item['quantity']; $q++) {
			
				$v += $item['productAttribute']->shipping_volume;
				
				while($v > (.8 * $containers[$c]['volume'])) {
					if($c == count($containers) - 1) {
						$cs[] = $c;
						$c = 0;
						$v = 0;
					}else{
						$c++;
					}
				}
			}

		}
		
		$cs[] = $c;
		
		return $cs;
		
	}
	
	public function getContainers()
	{
		$containers = array(
			array(
				'name' => 'SM FLAT RATE ENVELOPE',
				'width' => 10.000,
				'length' => 6.000,
				'height' => 0.250,
				'volume' => 15.000,
				'description' => '10" x 6" x 1/4"',
			),
			array(
				'name' => 'SM FLAT RATE BOX',
				'width' => 8.625,
				'length' => 5.375,
				'height' => 1.625,
				'volume' => 75.334,
				'description' => '8 5/8" x 5 3/8" x 1 5/8"',
			),
			array(
				'name' => 'MD FLAT RATE BOX',
				'width' => 11.000,
				'length' => 8.500,
				'height' => 5.500,
				'volume' => 514.250,
				'description' => '11" x 8 1/2" x 5 1/2"',
			),
			array(
				'name' => 'MD FLAT RATE BOX',
				'width' => 13.675,
				'length' => 11.875,
				'height' => 3.375,
				'volume' => 548.068,
				'description' => '13 5/8" x 11 7/8" x 3 3/8"',
			),
			array(
				'name' => 'LG FLAT RATE BOX',
				'width' => 12.000,
				'length' => 12.000,
				'height' => 5.500,
				'volume' => 792.000,
				'description' => '12" x 12" x 5 1/2"',
			),
		);
		
		return $containers;
		
	}
	
	public function doesItFit($container, $sizes)
	{
		$cw = $container['width'];
		$cl = $container['length'];
		$ch = $container['height'];
		
		$iw = $sizes['w'][0];
		$il = $sizes['l'][0];
		$ih = $sizes['h'][0];
		
		if(
			( ($iw <= (.8*$cw)) AND ($il <= (.8*$cl)) AND ($ih <= (.8*$ch)) ) OR 
			( ($iw <= (.8*$cl)) AND ($il <= (.8*$ch)) AND ($ih <= (.8*$cw)) ) OR 
			( ($iw <= (.8*$ch)) AND ($il <= (.8*$cw)) AND ($ih <= (.8*$cl)) )
		) {
			return TRUE;
		}
		
		return FALSE;
	}
    
}