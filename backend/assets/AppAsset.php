<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/animate.min.css',
        'css/paper-dashboard.css',
        'css/themify-icons.css',
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/chartist.min.js',
        'js/bootstrap-notify.js',
        'js/paper-dashboard.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        #'yii\bootstrap\BootstrapAsset'
    ];
}