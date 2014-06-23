<?php
namespace app\modules\ac\models\forms;

use Yii;
use yii\base\Model;
use app\modules\ac\models\Users;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     */
    public function validatePassword()
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError('password', 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
			// Login
			$login = Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
			// Reset attempts and set last login date and ip
			$user = $this->getUser();
			$user->date_last_login = date("Y-m-d H:i:s");
			$user->last_login_ip = Yii::$app->request->getUserIP();
			$user->login_attempts = 0;
			$update = $user->save();
			
			if($login AND $update) {
				return TRUE;
			}else{
				return FALSE;
			}
            
        } else {
			// Increment login attempts
			$user = $this->getUser();
			$na = $user->login_attempts;
			if(!$na) {
				$na = 0;
			}
			$user->login_attempts = $na+1;
			$update = $user->save();
			
            return false;
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