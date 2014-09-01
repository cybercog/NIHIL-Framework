<?php

namespace app\modules\ecom\models\forms;

use Yii;
use yii\base\Model;

use app\modules\ecom\components\usps\USPSRate;
use app\modules\ecom\components\usps\USPSRatePackage;

/**
 * DonateForm is the model behind the donate form.
 */
class ShippingMethodForm extends Model {

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
            'method' => 'Shipping Method',
        ];
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
    
}