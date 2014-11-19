<?php
namespace app\modules\ecom\models\forms;

use Yii;
use yii\base\Model;

use app\modules\ecom\models\Invoice;

/**
 * Add Extras Form
 */
class AddExtrasForm extends Model
{
    public $gratuity;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gratuity'], 'number'],
        ];
    }
	
	/**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gratuity' => 'Would you like to add gratuity?',
        ];
    }
	
	public function updateInvoice($invoice_id)
	{
		die('save');
	}
	
}