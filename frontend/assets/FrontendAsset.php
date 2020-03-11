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
class FrontendAsset extends AssetBundle
{
    /**
     * @var string
     */
    //public $sourcePath = '@frontend/web/bundle';
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    /**
     * @var array
     */
    public $css = [

   // 'themeassets/css/bootstrap.min.css',
    'themeassets/css/magnific-popup.css',
    'themeassets/css/circle.css',
    'themeassets/css/chatbot.css',
    'themeassets/css/typography.css',
    'themeassets/css/style.css',
    'themeassets/css/responsive.css',

    ];

    /**
     * @var array
     */
    public $js = [

        //'themeassets/js/jquery-3.3.1.min.js',
        'themeassets/js/popper.min.js',
        //'themeassets/js/bootstrap.min.js',
        'themeassets/js/owl.carousel.min.js',
        'themeassets/js/wow.min.js',
        'themeassets/js/app.min.js',
        'themeassets/js/circle.js',
        'themeassets/js/chatbot.js',
        'themeassets/js/main.js',
        'themeassets/js/custom.js',

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
