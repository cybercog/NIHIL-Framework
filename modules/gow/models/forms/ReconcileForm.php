<?php
namespace app\modules\gow\models\forms;

use Yii;
use yii\base\Model;

/**
 * Reconcile form
 */
class ReconcileForm extends Model
{
    public $stone;
	public $wood;
	public $food;
	public $ore;
	public $silver;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stone', 'wood', 'food', 'ore', 'silver'], 'required'],
			[['stone', 'wood', 'food', 'ore', 'silver'], 'integer'],
        ];
    }
	
}