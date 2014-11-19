<?php
namespace app\modules\ac\widgets;

use yii\base\Widget;
use yii\helpers\Html;

use app\modules\ac\models\User;

class AccountInformationWidget extends Widget
{
    protected $user;

    public function init()
    {
        parent::init();
        if ($this->user === NULL) {
			$this->user = \Yii::$app->user->getIdentity();
        }
    }

    public function run()
    {
			return '<div class="table-responsive">
						  <table class="table">
							<thead>
								<tr>
									<th colspan="2"><h2>Account Information  <a href="' . \Yii::$app->urlManager->createUrl(['ac/users/account']) . '" class="btn btn-primary pull-right"><i class="fa fa-edit"></i> edit</a></h2></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>Username</th>
									<td>' . $this->user->username . '</td>
								</tr>
								<tr>
									<th>Password</th>
									<td>********** <a href="' . \Yii::$app->urlManager->createUrl(['ac/users/change-password']) . '" class="btn btn-xs btn-primary pull-right"><i class="fa fa-lock"></i> change password</a></td>
								</tr>
								<tr>
									<th>Email</th>
									<td>' . $this->user->email . '</td>
								</tr>
								<tr>
									<th>Name</th>
									<td>' . $this->user->first_name . ' ' . $this->user->last_name . '</td>
								</tr>
								<tr>
									<th>Birthday</th>
									<td>' . date("F j, Y", strtotime($this->user->birthday)) . '</td>
								</tr>
								<tr>
									<th>Credit</th>
									<td>$' . $this->user->credit . ' <a href="' . \Yii::$app->urlManager->createUrl(['ecom/payments/add-credit']) . '" class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus"></i> add funds</a></td>
								</tr>
							</tbody>
						  </table>
						</div>';
    }
}