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
	
	
	
	
	
	public function calcUSPSShipping()
	{
		$rate = new USPSRate;
		
		$package = new USPSRatePackage;
		$package->setService(USPSRatePackage::SERVICE_FIRST_CLASS);
		$package->setFirstClassMailType(USPSRatePackage::MAIL_TYPE_LETTER);
		$package->setZipOrigination(91601);
		$package->setZipDestination(91730);
		$package->setPounds(0);
		$package->setOunces(3.5);
		$package->setContainer('');
		$package->setSize(USPSRatePackage::SIZE_REGULAR);
		$package->setField('Machinable', true);

		// add the package to the rate stack
		$rate->addPackage($package);
		
		die(print_r($rate->getRate()));
	}
	
	
	
	
	
    
}