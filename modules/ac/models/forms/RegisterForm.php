<?php
namespace app\modules\ac\models\forms;

use app\modules\ac\models\Users;
use app\modules\ac\models\AuthKeys;
use app\modules\ac\models\EmailChanges;
use app\modules\ac\models\PasswordChanges;
use yii\base\Model;
use Yii;

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
	public $dob_month;
	public $dob_day;
	public $dob_year;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\modules\ac\models\Users', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\app\modules\ac\models\Users', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
			
			[['confirm', 'nickname', 'dob_year', 'dob_month', 'dob_day'], 'required'],
			['nickname', 'filter', 'filter' => 'trim'],
			
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
            'dob_month' => 'DoB Month',
            'dob_day' => 'DoB Day',
            'dob_year' => 'DoB Year',
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
            $user = new Users();
            $user->username = $this->username;
            $user->email = $this->email;
			$user->nickname = $this->nickname;
			$user->credit = 0.00;
			$user->birthday = $this->dob_year . '-' . $this->dob_month . '-' . $this->dob_day;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            
			if($user->save(false)){
			
				$auth = Yii::$app->authManager;
				$urole = $auth->getRole('user');
				$auth->assign($urole, $user->id);
				
				// calculate expireTime (converting strtotime) and create userkey object
				$authkey = new AuthKeys;
				$authkey->user_id = $user->id;
				$authkey->type = 1;
				$authkey->key = Yii::$app->getSecurity()->generatePasswordHash($user->username . time());
				$authkey->date_created = date("Y-m-d H:i:s");
				$authkey->date_expires = date("Y-m-d H:i:s", time() + 259200);
				$authkey->save();
				
				//
				$passwordChange = new PasswordChanges;
				$passwordChange->user_id = $user->id;
				$passwordChange->hash = $user->password;
				$passwordChange->date_expires = date("Y-m-d H:i:s", time() + 2592000);
				$passwordChange->ip_address = Yii::$app->request->getUserIP();
				$passwordChange->user_agent = Yii::$app->request->getUserAgent();
				$passwordChange->save();
				
				//
				$emailChange = new EmailChanges;
				$emailChange->user_id = $user->id;
				$emailChange->email = $user->email;
				$emailChange->ip_address = Yii::$app->request->getUserIP();
				$emailChange->user_agent = Yii::$app->request->getUserAgent();
				$emailChange->save();
				
				$data = array('user' => $user, 'authkey' => $authkey);
			
				$htmlBody = Yii::$app->controller->renderPartial('@app/modules/ac/emails/html/register', $data, true);
				$textBody = Yii::$app->controller->renderPartial('@app/modules/ac/emails/text/register', $data, true);
				
				Yii::$app->mail->compose()
					->setTo($this->email)
					->setSubject('Welcome to The NIHIL Framework')
					->setTextBody($textBody)
					->setHtmlBody($htmlBody)
					->send();
					 
				return $user;
			}
        }
        return FALSE;
    }
	
	public function monthsDropdown()
	{	
		return array(
			'01' => '01',
			'02' => '02',
			'03' => '03',
			'04' => '04',
			'05' => '05',
			'06' => '06',
			'07' => '07',
			'08' => '08',
			'09' => '09',
			'10' => '10',
			'11' => '11',
			'12' => '12',
		);
	}
	
	public function daysDropdown()
	{	
		return array(
			'01' => '01',
			'02' => '02',
			'03' => '03',
			'04' => '04',
			'05' => '05',
			'06' => '06',
			'07' => '07',
			'08' => '08',
			'09' => '09',
			'10' => '10',
			'11' => '11',
			'12' => '12',
			'13' => '13',
			'14' => '14',
			'15' => '15',
			'16' => '16',
			'17' => '17',
			'18' => '18',
			'19' => '19',
			'20' => '20',
			'21' => '21',
			'22' => '22',
			'23' => '23',
			'24' => '24',
			'25' => '25',
			'26' => '26',
			'27' => '27',
			'28' => '28',
			'29' => '29',
			'30' => '30',
			'31' => '31',
		);
	}
	
	public function yearsDropdown()
	{	
		$arr = array();
		
		for($i = (date('Y')-13); $i >= (date('Y')-100); $i--) {
			$arr[$i] = $i;
		}
		
		return $arr;
	}
}