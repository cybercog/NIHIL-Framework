<?php
namespace app\modules\gow\models\forms;

use Yii;
use yii\base\Model;
use app\modules\ac\models\Users;
use app\modules\ac\models\AuthKeys;

/**
 * Login form
 */
class VerificationForm extends Model
{
    public $code;

    private $_user = false;
	private $_authkey = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function verify()
    {
        if ($this->validate()) {

			// Use the auth key
			// Update the user roles
			$authkey = AuthKeys::findByCode($this->code, 1);
			if(!$authkey) {
				$this->addError('code', 'Code is bad.');
				return FALSE;
			}
			
			$auth = Yii::$app->authManager;
			$verified = $auth->getRole('verified-user');
			$urole = $auth->getRole('user');
			$roles = $auth->getRolesByUser($authkey->user_id);
			
			if(array_key_exists('user', $roles) AND !array_key_exists('verified-user', $roles)) {
				$auth->revoke($urole, $authkey->user_id);
				$auth->assign($verified, $authkey->user_id);
				
				$authkey->date_used = date("Y-m-d H:i:s");
			
				if($authkey->save()){
					return TRUE;
				}
			}
            
        }
		
        return FALSE;
		
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Users::findByUsername($this->username);
        }

        return $this->_user;
    }
	
	/**
     * Finds authkey by [[code]]
     *
     * @return AuthKey|null
     */
    public function getAuthKey()
    {
        if ($this->_authkey === false) {
            $this->_authkey = AuthKeys::findByCode($this->code);
        }

        return $this->_authkey;
    }
}