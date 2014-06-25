<?php
namespace app\modules\ac\models\forms;

use Yii;
use yii\base\Model;
use app\modules\ac\models\Users;
use app\modules\ac\models\AuthKeys;

/**
 * Login form
 */
class ResetForm extends Model
{
    public $email;

    private $_user = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\app\modules\ac\models\Users',
                'message' => 'There is no user with such email.'
            ],
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function resetPassword()
    {
        if ($this->validate()) {

			// Use the auth key
			// Update the user roles
			return TRUE;
            
        } else {
		
            return FALSE;
        }
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
	
}