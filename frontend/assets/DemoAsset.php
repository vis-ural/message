<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use common\assets\Html5shiv;
use yii\bootstrap4\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Frontend application asset
 */
class DemoAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@frontend/assets/demo';
   // public $basePath = '@webroot';
    public $baseUrl = '@web';
    /**
     * @var array
     */
    public $css = [


    'css/style.css',


    ];

    /**
     * @var array
     */
    public $js = [
        'js/cookie.js',
        'js/bootstrap-notify.js',

        'js/custom.js',


    ];

    /**
     * @var array
     */
    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
        Html5shiv::class,
    ];
}
