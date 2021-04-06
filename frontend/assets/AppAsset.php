<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
        'css/font-awesome.css',
        'css/owl.carousel.css',
        'css/owl.theme.default.css',
        'css/normalize.css',
        'css/jquery.fancybox.css',
        'js/form/form.css',
        'css/menu.css',
        'css/style.css',
    ];
    public $js = [
        'js/flexmenu.min.js',
        'js/owl.carousel.min.js',
        'js/owl.autoplay.js',
        'js/jquery.fancybox.js',
        'js/jquery.mask.min.js',
        'js/jquery.mask.min.js',
        'js/base.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
