<?php
namespace app\modules\gow\models\forms;

use Yii;
use yii\base\Model;
use app\modules\ac\models\User;
use app\modules\ac\models\AuthKey;
use app\modules\ac\models\EmailChange;
use app\modules\ac\models\PasswordChange;

/**
 * Register form
 */
class RegisterForm extends Model
{
    public $username;
    public $email;
    public $password;
	public $confirm;
	public $nickname;
	public $birthday;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\modules\ac\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\app\modules\ac\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
			
			[['confirm', 'nickname', 'birthday'], 'required'],
			['nickname', 'filter', 'filter' => 'trim'],
			['birthday', 'date', 'format' => 'MM/dd/yyyy'],
			
			['confirm', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords do not match."],
        ];
    }
	
	/**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'nickname' => 'Nickname',
            'confirm' => 'Confirm',
            'birthday' => 'Birthday',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function register()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
			$user->nickname = $this->nickname;
			$user->credit = 0.00;
			$user->birthday = date("Y-m-d H:i:s", strtotime($this->birthday));
            $user->setPassword($this->password);
            $user->auth_key = \Yii::$app->getSecurity()->generateRandomString();
            
			if($user->save(false)){
			
				$auth = Yii::$app->authManager;
				$urole = $auth->getRole('user');
				$auth->assign($urole, $user->id);
				
				// calculate expireTime (converting strtotime) and create userkey object
				$authkey = new AuthKey;
				$authkey->user_id = $user->id;
				$authkey->type = 1;
				//$authkey->key = Yii::$app->getSecurity()->generatePasswordHash($user->username . time());
				$authkey->key = \Yii::$app->getSecurity()->generateRandomString();
				$authkey->date_created = date("Y-m-d H:i:s");
				$authkey->date_expires = date("Y-m-d H:i:s", time() + 259200);
				if(!$authkey->save()) {
					die(print_r($authkey));
				}
				
				//
				$passwordChange = new PasswordChange;
				$passwordChange->user_id = $user->id;
				$passwordChange->hash = $user->password;
				$passwordChange->date_created = date("Y-m-d H:i:s");
				$passwordChange->date_expires = date("Y-m-d H:i:s", time() + 2592000);
				$passwordChange->ip_address = Yii::$app->request->getUserIP();
				$passwordChange->user_agent = Yii::$app->request->getUserAgent();
				if(!$passwordChange->save()) {
					die(print_r($passwordChange));
				}
				
				//
				$emailChange = new EmailChange;
				$emailChange->user_id = $user->id;
				$emailChange->email = $user->email;
				$emailChange->date_created = date("Y-m-d H:i:s");
				$emailChange->ip_address = Yii::$app->request->getUserIP();
				$emailChange->user_agent = Yii::$app->request->getUserAgent();
				if(!$emailChange->save()) {
					die(print_r($emailChange));
				}
				
				$data = array('user' => $user, 'authkey' => $authkey);
			
				$htmlBody = Yii::$app->controller->renderPartial('@app/modules/ac/emails/register/html', $data, true);
				$textBody = Yii::$app->controller->renderPartial('@app/modules/ac/emails/register/text', $data, true);
				
				Yii::$app->mail->compose()
					->setTo($this->email)
					->setFrom([\Yii::$app->mail->transport->getUsername() => \Yii::$app->params['siteMeta']['title']])
					->setSubject('Welcome to ' . \Yii::$app->params['siteMeta']['title'])
					->setTextBody($textBody)
					->setHtmlBody($htmlBody)
					->send();
					 
				return $user;
			}
        }
        return FALSE;
    }
	
}