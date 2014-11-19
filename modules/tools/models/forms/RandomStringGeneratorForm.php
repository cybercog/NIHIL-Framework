<?php
namespace app\modules\tools\models\forms;

use Yii;
use yii\base\Model;

/**
 * Random String Generator form
 */
class RandomStringGeneratorForm extends Model
{
    public $count;
    public $length;
    public $ct_alpha_lower;
	public $ct_alpha_upper;
	public $ct_numeric;
	public $ct_special;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['count', 'length'], 'required'],
			['ct_alpha_lower', 'boolean', 'trueValue' => true, 'falseValue' => false, 'strict' => true],
			['ct_alpha_upper', 'boolean', 'trueValue' => true, 'falseValue' => false, 'strict' => true],
			['ct_numeric', 'boolean', 'trueValue' => true, 'falseValue' => false, 'strict' => true],
			['ct_special', 'boolean', 'trueValue' => true, 'falseValue' => false, 'strict' => true],
        ];
    }
	
	/**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'count' => 'How many strings would you like to make?',
            'length' => 'How many characters should these string be?',
            'ct_alpha_lower' => '(a-z)',
			'ct_alpha_upper' => '(A-Z)',
			'ct_numeric' => '(0-9)',
			'ct_special' => '(_-)',
        ];
    }

    public function generateStrings()
	{
		if(!$this->ct_alpha_lower && !$this->ct_alpha_upper && !$this->ct_numeric && !$this->ct_special) {
			$this->addError('ct_alpha_lower', 'Select one.');
			$this->addError('ct_alpha_upper', 'Select one.');
			$this->addError('ct_numeric', 'Select one.');
			$this->addError('ct_special', 'Select one.');
			return FALSE;
		}
		
		if($this->count > 100 || $this->count < 0) {
			$this->addError('count', 'Count must be between 1 and 100.');
			return FALSE;
		}
		
		if($this->length > 128 || $this->length < 0) {
			$this->addError('length', 'Length must be between 1 and 128.');
			return FALSE;
		}
		
		$ct_alpha_lower = "abcdefghijklmnopqrstuvwxyz";
		$ct_alpha_upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$ct_numeric = "0123456789";
		$ct_special = '_-';
		
		$use = '';
		if($this->ct_alpha_lower) {
			$use .= $ct_alpha_lower;
		}
		if($this->ct_alpha_upper) {
			$use .= $ct_alpha_upper;
		}
		if($this->ct_numeric) {
			$use .= $ct_numeric;
		}
		if($this->ct_special) {
			$use .= $ct_special;
		}
		
		$c = strlen($use) - 1;
		//die(print $c);
		$strings = array();
		for($i = 1; $i <= $this->count; $i++) {
			$new = '';
			for($j = 1; $j <= $this->length; $j++) {
				$r = rand(1,$c);
				$new .= $use[$r];
			}
			$strings[] = $new;
		}
		
		return $strings;
	}
	
}