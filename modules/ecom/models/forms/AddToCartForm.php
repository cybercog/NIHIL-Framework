<?php

namespace app\modules\ecom\models\forms;

use Yii;
use yii\base\Model;

use app\modules\ecom\models\ProductAttribute;
use app\modules\ecom\models\Product;
use app\modules\ecom\models\Attribute;

/**
 * DonateForm is the model behind the donate form.
 */
class AddToCartForm extends Model {

    public $qty;
	public $paid;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [["qty", "paid"], "required"],
			[["qty", "paid"], "integer"],
			['qty', 'compare', 'compareValue' => 0, 'operator' => '>'],
        ];
    }
	
	/**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'qty' => 'Qty',
            'paid' => 'Size',
        ];
    }
	
	public function save()
	{
		$paModel = new ProductAttribute;
		$pa = $paModel->getProductAttribute($this->paid);
		
		if (!$pa OR ($this->qty > $pa->stock)) {
            $this->addError('qty', 'Only ' . $pa->stock . ' in stock.');
			return FALSE;
        }
		
		if(\Yii::$app->cart->add($pa, $this->qty) == 'quantity-error'){
			$this->addError('qty', 'Only ' . $pa->stock . ' in stock.');
			return FALSE;
		}
		
		return TRUE;
	}
	
	public function paDropdown($pid)
	{
		
		$pas = ProductAttribute::getAllForProduct($pid);
		
		$ret = array();
		
		foreach($pas as $pa) {
			//die(print_r($pa));
			$a = Attribute::getAttribute($pa->attribute_id);
			if($pa->additional_price > 0) {
				$name = $a->name . ' (+$' . number_format($pa->additional_price, 2) . ')';
			}elseif($pa->additional_price < 0) {
				$name = $a->name . ' (-$' . number_format($pa->additional_price, 2) . ')';
			}else{
				$name = $a->name;
			}
			$ret[$pa->id] = $name;
		}
		
		return $ret;
	}
    
}