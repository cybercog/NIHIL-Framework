<?php
namespace app\modules\ac\models\forms;

use Yii;
use yii\base\Model;
use app\modules\ac\models\Users;
use app\modules\ac\models\AuthKeys;
use yii\helpers\Security;

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
			// calculate expireTime (converting strtotime) and create userkey object
			$user = Users::findByEmail($this->email);
			
			$authkey = new AuthKeys;
			$authkey->user_id = $user->id;
			$authkey->type = 4;
			$authkey->key = Security::generatePasswordHash($user->username . time());
			$authkey->date_created = date("Y-m-d H:i:s");
			$authkey->date_expires = date("Y-m-d H:i:s", time() + 259200);
			
			if(!$authkey->save()){
				return FALSE;
			}
			
			$data = array('user' => $user, 'authkey' => $authkey);
			
			$htmlBody = Yii::$app->controller->renderPartial('@app/modules/ac/emails/html/reset', $data, true);
			$textBody = Yii::$app->controller->renderPartial('@app/modules/ac/emails/text/reset', $data, true);
			
			Yii::$app->mail->compose()
				->setTo($this->email)
				->setSubject('Account Reset')
				->setTextBody($textBody)
				->setHtmlBody($htmlBody)
				->send();
					
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