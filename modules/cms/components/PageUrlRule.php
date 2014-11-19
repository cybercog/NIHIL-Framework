<?php
/**
 *  Todo: expand to more than 2 levels.
 */
namespace app\modules\cms\components;

use yii\web\UrlRule;
use app\modules\cms\models\Page;

class PageUrlRule extends UrlRule
{
    public $db = 'db';

    public function init()
    {
        parent::init();
        if ($this->name === null) {
            $this->name = __CLASS__;
        }
    }

    public function createUrl($manager, $route, $params)
    {
        if ($route === 'cms/pages/view') {
            if (isset($params['parent'], $params['id'])) {
                return $params['parent'] . '/' . $params['id'];
            } elseif (isset($params['id'])) {
                return $params['id'];
            }
        }
        return false;  // this rule does not apply
    }

    public function parseRequest($manager, $request)
    {
        $pathInfo = $request->getPathInfo();
		//die(print_r($pathInfo));
        //if (preg_match('%^(\w+)(/(\w+))?$%', $pathInfo, $matches)) {
		if ($matches = explode('/', $pathInfo)) {
			//die(print_r($matches));
            // check $matches[1] and $matches[3] to see
            // if they match a manufacturer and a model in the database
            // If so, set $params['manufacturer'] and/or $params['model']
            // and return ['car/index', $params]
			if(isset($matches[1])) {
				if($page = Page::find()->where(['slug' => $matches[1]])->one()) {
					if($page->parent->slug == $matches[0]) {
						return ['cms/pages/view', ['parent' => $page->parent->slug, 'id' => $page->slug]];
					}
				}
			}elseif(isset($matches[0])) {
				if($page = Page::find()->where(['slug' => $matches[0]])->one()) {
					if($page->slug == $matches[0]) {
						return ['cms/pages/view', ['id' => $page->slug]];
					}
				}
			}
        }
        return false;  // this rule does not apply
    }
}