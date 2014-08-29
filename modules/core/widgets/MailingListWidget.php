<?php
namespace app\modules\core\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class MailingListWidget extends Widget
{
    public function init()
    {
		parent::init();
    }
	
	public function run()
    {
        return '<div class="row"><div class="col-xs-12"><h3>Join Our Mailing List</h3>
								<p>Keep up-to-date with events, news, and any other important announcements.</p>
								<div class="input-group">
								  <input type="email" class="form-control" placeholder="jsmith@taraloka.org">
								  <span class="input-group-btn">
									<button class="btn btn-success" type="button">join</button>
								  </span>
								</div><!-- /input-group --></div></div>';
	}
	
}