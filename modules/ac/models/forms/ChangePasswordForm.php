<?php
namespace app\modules\ac\models\forms;

use Yii;
use yii\base\Model;
use app\modules\ac\models\Users;
use app\modules\ac\models\AuthKeys;
use app\modules\ac\models\PasswordChanges;

/**
 * Login form
 */
class ChangePasswordForm extends Model
{
	public $password;
	public $confirm;

    private $_user = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password', 'confirm'], 'required'],
			[['password', 'confirm'], 'string', 'min' => 6],
			['confirm', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords do not match."],
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function changePassword($authkey)
    {
        if ($this->validate()) {

			// Get User
			$user = Users::findIdentity($authkey->user_id);
			
			// Get Users previous passwords
			$passwords = PasswordChanges::find()
				->where(['user_id' => $authkey->user_id])
				->orderBy('date_created')
				->all();
			
			// Check new password against previous
			foreach($passwords as $password) {
				if(Yii::$app->getSecurity()->validatePassword($this->password, $password->hash)) {
					$this->addError('password', 'Cannot use a previous password.');
					return FALSE;
				}
			}
			
			//
			$authkey->date_used = date("Y-m-d H:i:s");
			$user->setPassword($this->password);
			
			// log password change
			$passwordChange = new PasswordChanges;
			$passwordChange->user_id = $user->id;
			$passwordChange->hash = $user->password;
			$passwordChange->date_expires = date("Y-m-d H:i:s", time() + 2592000);
			$passwordChange->ip_address = Yii::$app->request->getUserIP();
			$passwordChange->user_agent = Yii::$app->request->getUserAgent();
			
			// 
			if(!$authkey->save() OR !$passwordChange->save() OR !$user->save()) {
				return FALSE;
			}
			
			$data = array('user' => $user);
			
			$htmlBody = Yii::$app->controller->renderPartial('@app/modules/ac/emails/html/password-change', $data, true);
			$textBody = Yii::$app->controller->renderPartial('@app/modules/ac/emails/text/password-change', $data, true);
			
			Yii::$app->mail->compose()
				->setTo($user->email)
				->setSubject('Password Change')
				->setTextBody($textBody)
				->setHtmlBody($htmlBody)
				->send();
				
			return TRUE;
            
        } else {
		
            return FALSE;
        }
    }
	
	/**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function changeOwnPassword()
    {
		if ($this->validate()) {

			// Get User
			$user = Yii::$app->user->identity;
			
			// Get Users previous passwords
			$passwords = PasswordChanges::find()
				->where(['user_id' => $user->id])
				->orderBy('date_created')
				->all();
			
			// Check new password against previous
			foreach($passwords as $password) {
				if(Yii::$app->getSecurity()->validatePassword($this->password, $password->hash)) {
					$this->addError('password', 'Cannot use a previous password.');
					return FALSE;
				}
			}
			
			//
			$user->setPassword($this->password);
			
			// log password change
			$passwordChange = new PasswordChanges;
			$passwordChange->user_id = $user->id;
			$passwordChange->hash = $user->password;
			$passwordChange->date_expires = date("Y-m-d H:i:s", time() + 2592000);
			$passwordChange->ip_address = Yii::$app->request->getUserIP();
			$passwordChange->user_agent = Yii::$app->request->getUserAgent();
			
			// 
			if(!$passwordChange->save() OR !$user->save()) {
				return FALSE;
			}
			
			$data = array('user' => $user);
			
			$htmlBody = Yii::$app->controller->renderPartial('@app/modules/ac/emails/html/password-change', $data, true);
			$textBody = Yii::$app->controller->renderPartial('@app/modules/ac/emails/text/password-change', $data, true);
			
			Yii::$app->mail->compose()
				->setTo($user->email)
				->setSubject('Password Change')
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
    public function getUser($authkey)
    {
        if ($this->_user === false) {
            $this->_user = Users::findIdentity($authkey->user_id);
        }

        return $this->_user;
    }
	
}