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
        'css/bootstrap.min.css',
        'css/fontello.css',
        'css/font-awesome.min.css',
        'css/owl.carousel.min.css',
        'css/owl.theme.default.css',
        'css/style.css'
    ];
    public $js = [
        'js/jquery.min.js',
        'js/bootstrap.min.js',
        'js/navigation.js',
        'js/menumaker.js',
        'js/jquery.sticky.js',
        'js/sticky-header.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
