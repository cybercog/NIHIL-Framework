<?php
namespace app\modules\ac\rbac\rule;

use yii\rbac\Rule;

use app\modules\ecom\models\Customer;

/**
 * Checks if authorID matches user passed via params
 */
class CustomerInvoiceRule extends Rule
{
    public $name = 'isUsersInvoice';

    /**
     * @param string|integer $user the user ID.
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return boolean a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    { 
		if(!$customer = Customer::find()->where(['user_id' => $user])->one()) {
			return FALSE;
		}
		
		return isset($params['invoice']) ? $params['invoice']->customer_id == $customer->id : false;
		
    }
}