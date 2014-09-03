<?php

namespace app\modules\ecom\models\forms;

use Yii;
use yii\base\Model;

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
	public $comments;

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
			[["phone", "address2", "comments"], "safe"],
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
	
	
	
    
}