<?php
namespace app\modules\ecom\models\forms;

use Yii;
use yii\base\Model;

/**
 * Payment Methods Form
 */
class PaymentMethodsForm extends Model
{
    public $method;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['method', 'required'],
            ['method', 'integer'],
        ];
    }
	
	/**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'method' => 'Payment Method',
        ];
    }
	
	public function save()
	{
		die(print_r($this->method));
	}

    public function getRadioList()
	{
		return array(
			'2' => '<i class="fa fa-3x fa-credit-card"></i><br />Credit Card',
			//'3' => '<i class="fa fa-3x fa-university"></i><br />Check',
			//'4' => '<i class="fa fa-3x fa-btc"></i><br />Bitcoin',
			//'6' => '<i class="fa fa-3x fa-paypal"></i><br />PayPal',
			//'8' => '<i class="fa fa-3x fa-google-wallet"></i><br />Google',
		);
	}
	
}