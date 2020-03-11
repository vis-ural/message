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

   // 'css/bootstrap.min.css',
    'css/magnific-popup.css',
    'css/circle.css',
    'css/chatbot.css',
    'css/typography.css',
    'css/style.css',
    'css/responsive.css',

    ];

    /**
     * @var array
     */
    public $js = [

        //'js/jquery-3.3.1.min.js',
        'js/popper.min.js',
        //'js/bootstrap.min.js',
        'js/owl.carousel.min.js',
        'js/wow.min.js',
        'js/app.min.js',
        'js/circle.js',
        'js/chatbot.js',
        'js/main.js',
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
