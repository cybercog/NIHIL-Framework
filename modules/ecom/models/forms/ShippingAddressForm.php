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
class ShippingAddressForm extends Model
{

    public $first_name;
    public $last_name;
	public $email;
	public $phone;
	public $address1;
	public $address2;
	public $city;
	public $state;
	public $postal_code;

    /**
     * @var \amnah\yii2\user\models\User
     */
    protected $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [["first_name", "last_name", "email", "address1", "city", "state", "postal_code"], "required"],
            ["email", "email"],
			[["phone", "address2"], "safe"],
        ];
    }
	
	/**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
        ];
    }
	
	public function statesDropdown() {
		return array(
			'AL'=>"AL", 
			'AK'=>"AK", 
			'AZ'=>"AZ", 
			'AR'=>"AR", 
			'CA'=>"CA", 
			'CO'=>"CO", 
			'CT'=>"CT", 
			'DE'=>"DE", 
			'DC'=>"DC", 
			'FL'=>"FL", 
			'GA'=>"GA", 
			'HI'=>"HI", 
			'ID'=>"ID", 
			'IL'=>"IL", 
			'IN'=>"IN", 
			'IA'=>"IA", 
			'KS'=>"KS", 
			'KY'=>"KY", 
			'LA'=>"LA", 
			'ME'=>"ME", 
			'MD'=>"MD", 
			'MA'=>"MA", 
			'MI'=>"MI", 
			'MN'=>"MN", 
			'MS'=>"MS", 
			'MO'=>"MO", 
			'MT'=>"MT",
			'NE'=>"NE",
			'NV'=>"NV",
			'NH'=>"NH",
			'NJ'=>"NJ",
			'NM'=>"NM",
			'NY'=>"NY",
			'NC'=>"NC",
			'ND'=>"ND",
			'OH'=>"OH", 
			'OK'=>"OK", 
			'OR'=>"OR", 
			'PA'=>"PA", 
			'RI'=>"RI", 
			'SC'=>"SC", 
			'SD'=>"SD",
			'TN'=>"TN", 
			'TX'=>"TX", 
			'UT'=>"UT", 
			'VT'=>"VT", 
			'VA'=>"VA", 
			'WA'=>"WA", 
			'WV'=>"WV", 
			'WI'=>"WI", 
			'WY'=>"WY"
		);
	}
	
	
	// Get total volume of order items
	// Select shipping container with volume > sum(volume order items)
	// Volume of Container is 100%
	// Fill with Order Items to 80%
	// If remainder of order is <=10%, add to container
	// Otherwise get new box
	
	// $shipping_containers = array(
		// 0 => array(
			// 'name' => 'SM FLAT RATE BOX',
			// 'width' => 8.625,
			// 'length' => 5.375,
			// 'height' => 1.625,
			// 'volume' => 75.334,
			// 'description' => '8 5/8" x 5 3/8" x 1 5/8"';
		// ),
		// 1 => array(
			// 'name' => 'MD FLAT RATE BOX',
			// 'width' => 11.000,
			// 'length' => 8.500,
			// 'height' => 5.500,
			// 'volume' => 514.250,
			// 'description' => '11" x 8 1/2" x 5 1/2"';
		// ),
		// 2 => array(
			// 'name' => 'MD FLAT RATE BOX',
			// 'width' => 13.675,
			// 'length' => 11.875,
			// 'height' => 3.375,
			// 'volume' => 548.068,
			// 'description' => '13 5/8" x 11 7/8" x 3 3/8"';
		// ),
		// 3 => array(
			// 'name' => 'LG FLAT RATE BOX',
			// 'width' => 12.000,
			// 'length' => 12.000,
			// 'height' => 5.500,
			// 'volume' => 792.000,
			// 'description' => '12" x 12" x 5 1/2"';
		// ),
		// 4 => array(
			// 'name' => 'SM FLAT RATE ENVELOPE',
			// 'width' => 10.000,
			// 'length' => 6.000,
			// 'height' => 0.250,
			// 'volume' => 15.000,
			// 'description' => '10" x 6" x 1/4"';
		// ),
	// );
	
	
	public function calcUSPSShipping()
	{
		$rate = new USPSRate;
		
		$package1 = new USPSRatePackage;
		$package1->setService(USPSRatePackage::SERVICE_ALL);
		$package1->setFirstClassMailType(USPSRatePackage::MAIL_TYPE_PACKAGE_SERVICE);
		$package1->setZipOrigination(\Yii::$app->params['usps']['origin_address']['zipcode']);
		$package1->setZipDestination($this->postal_code);
		$package1->setPounds(1);
		$package1->setOunces(8);
		$package1->setContainer(USPSRatePackage::CONTAINER_VARIABLE);
		$package1->setSize(USPSRatePackage::SIZE_REGULAR);
		$package1->setField('Width', 15);
		$package1->setField('Length', 15);
		$package1->setField('Height', 30);
		
		$package1->setField('Machinable', true);

		// add the package to the rate stack
		$rate->addPackage($package1);
		
		//die(print_r($rate));
		$c = $this->createVirtualContainer(15,30,15);
		$this->printVirtualContainer($c);
		//die(print_r($c));
		//die(print count($c[0][0]));
		
		$rate->getRate();
		
		die(print_r($rate->getArrayResponse()));
	}
	
	
	
	
	
	
	public function createVirtualContainer($width, $length, $height) 
	{
		$ret = array_fill(0, floor($width), array_fill(0, floor($length), array_fill(0, floor($height), 0)));
		return $ret;
	}
	
	public function printVirtualContainer($vc)
	{
		$top = '<h1>Top</h1>' . "\n";
		$bottom = '<h1>Bottom</h1>' . "\n";
		$front = '<h1>Front</h1>' . "\n";
		$right = '<h1>Right</h1>' . "\n";
		$back = '<h1>Back</h1>' . "\n";
		$left = '<h1>Left</h1>' . "\n";
		
		for($i = 0; $i < count($vc); $i++) {
			for($j = 0; $j < count($vc[$i]); $j++) {
				for($k = 0; $k < count($vc[$i][$j]); $k++) {
					
					// Top
					if($k == count($vc[$i][$j])-1) {
						$top .= $vc[$i][$j][$k] . ' ';
					}
					
					// Bottom
					if($k == 0) {
						$bottom .= $vc[$i][$j][$k] . ' ';
					}
					
				}
			}
			$top .= "<br />\n";
			$bottom .= "<br />\n";
		}
		
		die($top . $front . $right . $back . $left . $bottom);
	}
	
	public function printVCTop($vc) 
	{
		$ret = '';
		for($i = 0; $i < count($vc); $i++) {
			for($j = 0; $j < count($vc[$i]); $j++) {
				$ret .= $vc[$i][$j][count($vc[$i][$j])-1] . ' ';
			}
			$ret .= "<br />\n";
		}
		
		return $ret;
	}
	
	
	
	
	
	public function startCheckout()
	{
		// validate form
		if ($this->validate()) {
		
			// get customer
			$shipping_address = $this->saveShippingAddress();
			
			// save shipping address to cart session
			if(\Yii::$app->cart->addShippingAddress($shipping_address)) {
				return TRUE;
			}
			
		}
		
		// invalid form
		return FALSE;
		
	}
	
	public function saveShippingAddress() 
	{
		// find customer or create new customer
		$shipping_address = ShippingAddress::find()
			->where([
				'first' => $this->first_name,
				'last' => $this->last_name,
				'email' => $this->email,
				'address1' => $this->address1,
				'city' => $this->city,
				'state' => $this->state,
				'zipcode' => $this->postal_code,
				'country' => 'US'
			])
			->one();
			
		if(!$shipping_address) {
			$shipping_address = new ShippingAddress;

			$shipping_address->first = $this->first_name;
			$shipping_address->last = $this->last_name;
			$shipping_address->email = $this->email;
			$shipping_address->address1 = $this->address1;
			$shipping_address->city = $this->city;
			$shipping_address->state = $this->state;
			$shipping_address->zipcode = $this->postal_code;
			$shipping_address->country = 'US';
			if(isset($this->phone) AND $this->phone != '') {
				$shipping_address->phone = $this->phone;
			}
			if(isset($this->address2) AND $this->address2 != '') {
				$shipping_address->address2 = $this->address2;
			}

			if(!$shipping_address->save()) {
				//die('bad shipping_address');
				return FALSE;
			}
		}
		
		return $shipping_address->id;
	}
	
    
}