<?php
namespace app\modules\ac\rbac\rule;

use yii\rbac\Rule;

use app\modules\ac\models\AuthKeys;

/**
 * Checks if authorID matches user passed via params
 */
class PasswordAuthKeyRule extends Rule
{
    public $name = 'goodPasswordAuthKey';

    /**
     * @param string|integer $user the user ID.
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return boolean a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    { 
        if(!$ak = AuthKeys::find()->where(['key' => $params['key']])->one()) {
			return FALSE;
		}
		
		if((strtotime($ak->date_expires) > time())) {
			return TRUE;
		}
		
		return FALSE;
		
    }
}