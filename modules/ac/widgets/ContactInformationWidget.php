<?php
namespace app\modules\ac\widgets;

use yii\base\Widget;
use yii\helpers\Html;

use app\modules\ac\models\User;

class ContactInformationWidget extends Widget
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
									<th colspan="2"><h2>Contact Information  <a href="' . \Yii::$app->urlManager->createUrl(['ecom/contacts/update?id=' . $this->user->contact_id]) . '" class="btn btn-primary pull-right"><i class="fa fa-edit"></i> edit</a></h2></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>Name</th>
									<td>' . $this->user->contact->first . ' ' . $this->user->contact->last . '</td>
								</tr>
								<tr>
									<th>Company</th>
									<td>' . $this->user->contact->company . '</td>
								</tr>
								<tr>
									<th>Email</th>
									<td>' . $this->user->contact->email . '</td>
								</tr>
								<tr>
									<th>Address</th>
									<td>' . $this->user->contact->address1 . '</td>
								</tr>
								<tr>
									<th>&nbsp;</th>
									<td>' . $this->user->contact->city . ', ' . $this->user->contact->state . ' ' . $this->user->contact->zipcode . '</td>
								</tr>
								<tr>
									<th>Phone</th>
									<td>' . $this->user->contact->phone . '</td>
								</tr>
							</tbody>
						  </table>
						</div>';
    }
}