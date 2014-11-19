<?php
namespace app\modules\ac\models\forms;

use Yii;
use yii\base\Model;
use app\modules\ac\models\User;
use app\modules\ac\models\AuthKey;
use app\modules\ac\models\EmailChange;
use app\modules\ac\models\PasswordChange;

/**
 * Register form
 */
class SignUpForm extends Model
{
    public $username;
    public $email;
    public $password;
	public $confirm;
	public $first_name;
	public $last_name;
	public $dob_month;
	public $dob_day;
	public $dob_year;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'first_name', 'last_name'], 'filter', 'filter' => 'trim'],
            [['username', 'first_name', 'last_name'], 'required'],
            ['username', 'unique', 'targetClass' => '\app\modules\ac\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 100],
			[['first_name', 'last_name'], 'string', 'min' => 2, 'max' => 100],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\app\modules\ac\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
			
			[['confirm', 'dob_month', 'dob_day', 'dob_year'], 'required'],
			[['dob_month', 'dob_day', 'dob_year'], 'integer'],
			
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
            'first_name' => 'First Name',
			'last_name' => 'Last Name',
            'confirm' => 'Confirm Password',
            'dob_month' => 'Birthday',
			'dob_day' => 'Birthday',
			'dob_year' => 'Birthday',
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
			$user->first_name = $this->first_name;
			$user->last_name = $this->last_name;
			$user->credit = 0.00;
			$user->birthday = $this->dob_year . '-' . $this->dob_month . '-' . $this->dob_day;
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
					->setTo([$this->email => $this->first_name . ' ' . $this->last_name])
					->setFrom(\Yii::$app->params['emails']['no-reply'])
					->setSubject('Welcome to ' . \Yii::$app->params['siteMeta']['title'])
					->setTextBody($textBody)
					->setHtmlBody($htmlBody)
					->send();
					 
				return $user;
			}
        }
        return FALSE;
    }
	
	public function getMonthsDropdown()
	{
		return array(
			'01' => 'January',
			'02' => 'February',
			'03' => 'March',
			'04' => 'April',
			'05' => 'May',
			'06' => 'June',
			'07' => 'July',
			'08' => 'August',
			'09' => 'September',
			'10' => 'October',
			'11' => 'November',
			'12' => 'December',
		);
	}
	
	public function getDaysDropdown()
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
	
	public function getYearsDropdown()
	{
		$ret = array();
		
		for($date = (( (int) date("Y")) - 10); $date >= (( (int) date("Y")) - 100); $date--) {
			$ret[$date] = $date;
		}
		
		return $ret;
	}
	
}