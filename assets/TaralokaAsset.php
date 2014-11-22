<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class TaralokaAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
		'css/bootstrap/bootstrap.min.css',
		'css/font-awesome/font-awesome.min.css',
		//'css/skeuocard/skeuocard.min.css',
        'css/taraloka.css',
    ];
	public $cssOptions = [
		'media' => 'screen,print',
	];
    public $js = [
		//'js/jquery/jquery-1.11.1.min.js',
		'js/jquery/jquery-2.1.1.min.js',
		'js/bootstrap/bootstrap.min.js',
		//'js/skeuocard/skeuocard.min.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
