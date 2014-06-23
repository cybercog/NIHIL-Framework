<?php
namespace app\modules\ac\models\forms;

use app\modules\ac\models\Users;
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
            $user->save();
            return $user;
        }
        return null;
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